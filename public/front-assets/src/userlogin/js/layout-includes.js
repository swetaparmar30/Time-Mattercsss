(function () {
  function loadIncludes() {
    var includeNodes = document.querySelectorAll("[data-include]");
    var tasks = Array.prototype.map.call(includeNodes, function (node) {
      var includePath = node.getAttribute("data-include");
      return fetch(includePath)
        .then(function (response) {
          if (!response.ok) {
            throw new Error("Unable to load include: " + includePath);
          }
          return response.text();
        })
        .then(function (html) {
          node.outerHTML = html;
        });
    });

    return Promise.all(tasks).then(function () {
      // Search functionality
      var searchInput = document.getElementById("globalSearchInput");
      var quickResults = document.getElementById("quickSearchResults");
      var clearBtn = document.getElementById("clearSearch");
      var searchTimer = null;

      if (searchInput && quickResults) {
        searchInput.addEventListener("input", function (e) {
          clearTimeout(searchTimer);
          var query = e.target.value.trim();

          if (clearBtn) {
            clearBtn.style.display = query.length > 0 ? "flex" : "none";
          }

          if (query.length < 2) {
            quickResults.hidden = true;
            quickResults.innerHTML = "";
            return;
          }

          searchTimer = setTimeout(function () {
            fetch("/quick-search?query=" + encodeURIComponent(query))
              .then(function (res) { return res.json(); })
              .then(function (data) {
                renderQuickResults(data, query);
              });
          }, 300);
        });

        if (clearBtn) {
          clearBtn.addEventListener("click", function () {
            searchInput.value = "";
            clearBtn.style.display = "none";
            quickResults.hidden = true;
            quickResults.innerHTML = "";
            
            // If on search results page, redirect back or to dashboard
            if (window.location.pathname.includes("/search")) {
              window.location.href = "/dashboard";
            } else {
              searchInput.focus();
            }
          });
        }

        document.addEventListener("click", function (e) {
          if (!searchInput.contains(e.target) && !quickResults.contains(e.target)) {
            quickResults.hidden = true;
          }
        });

        function renderQuickResults(data, query) {
          var html = "";
          var hasResults = data.files && data.files.length > 0;

          if (!hasResults) {
            html = '<div class="quick-search-no-results">No matches found for "' + query + '"</div>';
          } else {
            if (data.files.length > 0) {
              html += '<div class="quick-search-group"><div class="quick-search-label">Files & Resources</div></div>';
              data.files.forEach(function (file) {
                html += '<a href="/file/preview/' + file.id + '" target="_blank" class="quick-search-item">' +
                  '<span>' + file.name + '</span></a>';
              });
            }

            html += '<div style="padding: 12px 16px; border-top: 1px solid #f1f5f9; margin-top: 8px;">' +
              '<a href="/search?query=' + encodeURIComponent(query) + '" style="font-size: 13px; font-weight: 600; color: #284884;">View all results &rarr;</a>' +
              '</div>';
          }

          quickResults.innerHTML = html;
          quickResults.hidden = false;
        }
      }

      var currentPage = document.body.getAttribute("data-page");
      if (currentPage) {
        var activeLink = document.querySelector('[data-nav="' + currentPage + '"]');
        if (activeLink) {
          activeLink.classList.add("active");
        }
      }

      var profileToggle = document.getElementById("profileMenuToggle");
      var profilePopup = document.getElementById("profilePopup");
      var profileClose = document.getElementById("profilePopupClose");

      if (profileToggle && profilePopup && profileClose) {
        function setProfilePopupState(isOpen) {
          profilePopup.classList.toggle("is-open", isOpen);
          profilePopup.hidden = !isOpen;
          profileToggle.setAttribute("aria-expanded", String(isOpen));
          document.body.style.overflow = isOpen ? "hidden" : "";
        }

        profileToggle.addEventListener("click", function () {
          var isOpen = profilePopup.classList.contains("is-open");
          setProfilePopupState(!isOpen);
        });

        profileClose.addEventListener("click", function () {
          setProfilePopupState(false);
        });

        profilePopup.addEventListener("click", function (event) {
          if (event.target === profilePopup) {
            setProfilePopupState(false);
          }
        });

        document.addEventListener("keydown", function (event) {
          if (event.key === "Escape" && profilePopup.classList.contains("is-open")) {
            setProfilePopupState(false);
          }
        });
      }

      document.dispatchEvent(new CustomEvent("layout:ready"));
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", loadIncludes);
  } else {
    loadIncludes();
  }
})();
