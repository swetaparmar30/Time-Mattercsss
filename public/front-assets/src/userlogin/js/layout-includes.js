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
      var profileName = document.querySelector(".portal-user-info strong");
      var profileGreeting = document.getElementById("profilePopupGreeting");

      if (profileName && profileGreeting) {
        profileGreeting.textContent = "Hi, " + profileName.textContent.trim() + "!";
      }

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
