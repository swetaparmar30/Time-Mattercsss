@php
    $id ??= "textarea1";
    $name = $id; // For compatibility, most users pass id as field name

    // Handle [ and ] in id/name for arrays
    if (str_ends_with($id, '[]')) {
        // Separate id and name, only name gets the []
        $baseId = str_replace('[]', '', $id);

        $inputId = "{$baseId}";
        $inputName = "{$baseId}[]";

        $htmlInputId = "{$baseId}_html";
        $htmlInputName = "{$baseId}_html[]";

        $toggleBtnId = "{$baseId}_toggle_html";
    } else {
        $inputId = $id;
        $inputName = $id;
        $htmlInputId = "{$id}_html";
        $htmlInputName = "{$id}_html";
        $toggleBtnId = "{$id}_toggle_html";
    }
    $defaultValue = $value ?? '';
    $defaultHtmlValue = $htmlValue ?? '';
    $placeholder ??= 'Enter Description';
@endphp
<div class="custom-rich-textarea position-relative">
    {{-- Toggle HTML View Button --}}
    <button type="button" class="btn btn-sm mb-2 p-0 ps-1 pt-1 position-absolute top-0 z-1" id="{{ $toggleBtnId }}"
        onclick="toggleHtmlView_{{ $inputId }}()"><i class="ph ph-brackets-angle"></i></button>

    {{-- Simple WYSIWYG ContentEditable --}}
    <div id="{{ $inputId }}" class="form-control px-4" style="min-height: 120px; max-height: 600px; overflow:auto;"
        contenteditable="true" data-for-html-input="{{ $htmlInputId }}">{!! old($htmlInputName, $defaultValue) !!}</div>
    <span class="wysiwyg-placeholder" id="{{ $inputId }}_placeholder" style="display: none;">{{ $placeholder }}</span>

    {{-- Hidden html textarea for submitting actual HTML --}}
    <textarea class="px-4" id="{{ $htmlInputId }}" name="{{ $htmlInputName }}" placeholder="{{ $placeholder }}"
        style="display:none;">{{ old($htmlInputName, $defaultHtmlValue) }}</textarea>
</div>
@push('component-scripts')
    <script>
        // Synchronize contenteditable div with hidden textarea for HTML
        function syncHtmlToTextarea_{{ $inputId }}() {
            var contentDiv = document.getElementById('{{ $inputId }}');
            var htmlTextarea = document.getElementById('{{ $htmlInputId }}');
            if (contentDiv && htmlTextarea) {
                htmlTextarea.value = contentDiv.innerHTML;
            }
        }

        // Show/hide placeholder depending on content
        function updatePlaceholder_{{ $inputId }}() {
            var contentDiv = document.getElementById('{{ $inputId }}');
            var placeholderElem = document.getElementById('{{ $inputId }}_placeholder');
            if (!contentDiv || !placeholderElem) return;

            // isEmpty if div is just whitespace or no text, and no <img> or <hr> etc
            var isEmpty = contentDiv.textContent.trim() === "" && (contentDiv.innerHTML.trim() === "" || contentDiv.innerHTML.trim() === "<br>");
            if (isEmpty && contentDiv.style.display !== "none") {
                placeholderElem.style.display = '';
            } else {
                placeholderElem.style.display = 'none';
            }
        }

        // Initial sync on page load
        document.addEventListener('DOMContentLoaded', function () {
            syncHtmlToTextarea_{{ $inputId }}();
            updatePlaceholder_{{ $inputId }}();
        });

        // Live sync on input (typing, pasting, etc)
        document.getElementById('{{ $inputId }}').addEventListener('input', function () {
            syncHtmlToTextarea_{{ $inputId }}();
            updatePlaceholder_{{ $inputId }}();
        });

        // Also update placeholder on focus/blur
        document.getElementById('{{ $inputId }}').addEventListener('focus', function () {
            updatePlaceholder_{{ $inputId }}();
        });
        document.getElementById('{{ $inputId }}').addEventListener('blur', function () {
            updatePlaceholder_{{ $inputId }}();
        });

        // Paste handling: prevent pasting complete HTML, only insert body or plain text
        document.addEventListener('DOMContentLoaded', function () {
            const target = document.getElementById('{{ $inputId }}');
            if (!target) return;

            target.addEventListener('paste', function (e) {
                let clipboardHtml = '',
                    clipboardText = '';

                if (e.clipboardData) {
                    clipboardHtml = e.clipboardData.getData('text/html');
                    clipboardText = e.clipboardData.getData('text/plain');
                } else if (window.clipboardData) {
                    clipboardText = window.clipboardData.getData('Text');
                }

                if (clipboardHtml) {
                    let doc = new DOMParser().parseFromString(clipboardHtml, "text/html"),
                        bodyContent = doc.body ? doc.body.innerHTML : clipboardHtml;

                    e.preventDefault();
                    target.innerHTML += bodyContent;
                } else if (clipboardText) {
                    target.textContent += clipboardText;
                }
                updatePlaceholder_{{ $inputId }}();
            });
        });

        // Toggle HTML/source view for this editor
        function toggleHtmlView_{{ $inputId }}() {
            var contentDiv = document.getElementById('{{ $inputId }}');
            var htmlTextarea = document.getElementById('{{ $htmlInputId }}');
            var placeholderElem = document.getElementById('{{ $inputId }}_placeholder');
            if (!contentDiv || !htmlTextarea) return;

            if (contentDiv.style.display !== 'none') {
                // Switch to HTML textarea mode
                htmlTextarea.value = contentDiv.innerHTML;
                contentDiv.style.display = 'none';
                htmlTextarea.style.display = 'block';
                htmlTextarea.classList.add('form-control');
                htmlTextarea.style.minHeight = '120px';
                htmlTextarea.style.maxHeight = '600px';
                if (placeholderElem) {
                    placeholderElem.style.display = 'none';
                }
            } else {
                // Switch to WYSIWYG mode
                contentDiv.innerHTML = htmlTextarea.value;
                contentDiv.style.display = 'block';
                htmlTextarea.style.display = 'none';
                updatePlaceholder_{{ $inputId }}();
            }
        }
    </script>
@endpush
