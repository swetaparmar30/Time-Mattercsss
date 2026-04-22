class RichTextEditor {
    static galleryModalSingleton = null;
    static galleryModalAPI = null;
    constructor(t, l = {}) {
        (this.textarea = t),
            (this.options = {
                ...l,
                showDescriptionTools:
                    "boolean" == typeof l.showDescriptionTools &&
                    l.showDescriptionTools,
            }),
            !0 === this.options.showDescriptionTools
                ? ("boolean" != typeof l.showToolbar &&
                    (this.options.showToolbar = !1),
                    "boolean" != typeof l.showStatusBar &&
                    (this.options.showStatusBar = !1))
                : ((this.options.showToolbar =
                    "boolean" != typeof l.showToolbar || l.showToolbar),
                    (this.options.showStatusBar =
                        "boolean" != typeof l.showStatusBar || l.showStatusBar)),
            (this.editor = null),
            (this.toolbar = null),
            (this.isEditorFocused = !1),
            this.init();
    }
    init() {
        this.createEditor(),
            this.createToolbar(),
            this.bindEvents(),
            this.updateWordCount(),
            this.updateButtonStates(),
            this.enableCellSelection(),
            this.options.galleryApiUrl &&
            "string" == typeof this.options.galleryApiUrl &&
            "" !== this.options.galleryApiUrl.trim() &&
            ((RichTextEditor.galleryModalAPI = this.options.galleryApiUrl),
                RichTextEditor.galleryModalSingleton ||
                ((RichTextEditor.galleryModalSingleton =
                    this.createGallerySelectionModal()),
                    document.body.appendChild(
                        RichTextEditor.galleryModalSingleton
                    )));
    }
    createEditor() {
        let t = document.createElement("div");
        (t.className = "rich-editor-container"),
            (this.imageMenu = this.createImageMenu()),
            document.body.appendChild(this.imageMenu),
            (this.editor = document.createElement("div")),
            (this.editor.className = "rich-editor"),
            (this.editor.contentEditable = !0),
            (this.editor.spellcheck = !0),
            (this.editor.placeholder =
                this.textarea.placeholder || "Start typing here..."),
            this.textarea.value &&
            (this.editor.innerHTML = this.textarea.value);
        let l = () => {
            this.editor.innerHTML !== this.textarea.value &&
                ((this.editor.innerHTML = this.textarea.value),
                    this.updateWordCount && this.updateWordCount());
        };
        this.textarea.addEventListener("change", l),
            this.textarea.addEventListener("input", l);
        let i = this.createStatusBar(),
            a =
                !1 !== this.options.showToast
                    ? this.createSuccessToast()
                    : null;
        t.appendChild(this.editor),
            t.appendChild(i),
            a && document.body.appendChild(a),
            this.textarea.parentNode.insertBefore(t, this.textarea.nextSibling),
            this.createFileInputs(),
            (this.textarea.style.display = "none"),
            !1 !== this.options.focus && this.editor.focus(),
            this.makeExistingImagesResizable();
    }
    createFileInputs() {
        (this.imageFileInput = document.createElement("input")),
            (this.imageFileInput.type = "file"),
            (this.imageFileInput.accept = "image/*"),
            (this.imageFileInput.style.display = "none"),
            this.imageFileInput.addEventListener("change", (t) =>
                this.handleImageUpload(t)
            ),
            (this.videoFileInput = document.createElement("input")),
            (this.videoFileInput.type = "file"),
            (this.videoFileInput.accept = "video/*"),
            (this.videoFileInput.style.display = "none"),
            this.videoFileInput.addEventListener("change", (t) =>
                this.handleVideoUpload(t)
            ),
            this.editor.parentNode.appendChild(this.imageFileInput),
            this.editor.parentNode.appendChild(this.videoFileInput);
    }
    findClosestElement(t, l) {
        if (t.nodeType === Node.ELEMENT_NODE) {
            if (t.closest) return t.closest(l);
            for (; t && t.nodeType === Node.ELEMENT_NODE;) {
                if (t.matches && t.matches(l)) return t;
                t = t.parentElement;
            }
        } else {
            let i = t.parentElement;
            for (; i;) {
                if (i.matches && i.matches(l)) return i;
                let a = i.querySelector(l);
                if (a) return a;
                i = i.parentElement;
            }
        }
        return null;
    }
    createToolbar() {
        let t = {
            formatting: this.createFormattingGroup.bind(this),
            lineHeight: this.createLineHeightGroup.bind(this),
            color: this.createColorGroup.bind(this),
            alignment: this.createAlignmentGroup.bind(this),
            list: this.createListGroup.bind(this),
            media: this.createMediaGroup.bind(this),
            utility: this.createUtilityGroup.bind(this),
            moreOptions: this.createMoreOptionsGroup.bind(this),
            table: this.createTableGroup.bind(this),
        },
            l = Array.isArray(this.options.disabledTools)
                ? this.options.disabledTools
                : [];
        (t.media = this.createMediaGroupWithGallery.bind(this)),
            (this.toolbar = document.createElement("div")),
            (this.toolbar.className = "rich-toolbar"),
            [
                "formatting",
                "lineHeight",
                "color",
                "table",
                "alignment",
                "list",
                "media",
                "utility",
                "moreOptions",
            ].forEach((i) => {
                if (!l.includes(i) && "function" == typeof t[i]) {
                    let a = t[i]();
                    a && this.toolbar.appendChild(a);
                }
            }),
            (this.alternativeToolbar = document.createElement("div")),
            (this.alternativeToolbar.className = "rich-toolbar"),
            ["alignment", "list", "media", "utility"].forEach((i) => {
                if (!l.includes(i) && "function" == typeof t[i]) {
                    let a = t[i]();
                    a && this.alternativeToolbar.appendChild(a);
                }
            }),
            (this.advancedToolbar = document.createElement("div")),
            (this.advancedToolbar.className = "rich-toolbar"),
            [
                "alignment",
                "list",
                "media",
                "utility",
                "moreOptions",
                "table",
            ].forEach((i) => {
                if (!l.includes(i) && "function" == typeof t[i]) {
                    let a = t[i]();
                    a && this.advancedToolbar.appendChild(a);
                }
            }),
            "advanced" === this.options.toolbarType
                ? this.editor.parentNode.insertBefore(
                    this.advancedToolbar,
                    this.editor
                )
                : this.options.showDescriptionTools
                    ? this.editor.parentNode.insertBefore(
                        this.alternativeToolbar,
                        this.editor
                    )
                    : this.editor.parentNode.insertBefore(
                        this.toolbar,
                        this.editor
                    );
    }
    createFormattingGroup() {
        let t = document.createElement("div");
        (t.className = "toolbar-group"),
            [
                {
                    command: "bold",
                    icon: "fa-bold",
                    title: "Bold (Ctrl+B)",
                    class: "btn-bold",
                },
                {
                    command: "italic",
                    icon: "fa-italic",
                    title: "Italic (Ctrl+I)",
                    class: "btn-italic",
                },
                {
                    command: "underline",
                    icon: "fa-underline",
                    title: "Underline (Ctrl+U)",
                    class: "btn-underline",
                },
                {
                    command: "strikeThrough",
                    icon: "fa-strikethrough",
                    title: "Strikethrough",
                    class: "btn-strikethrough",
                },
            ].forEach((l) => {
                let i = this.createButton(l.command, l.icon, l.title, l.class);
                t.appendChild(i);
            });
        let l = document.createElement("select");
        (l.className = "toolbar-select"),
            (l.title = "Font Family"),
            [
                "Arial",
                "Times New Roman",
                "Courier New",
                "Verdana",
                "Roboto",
                "Open Sans",
                "Lato",
                "Montserrat",
                "Poppins",
                "Merriweather",
                "Playfair Display",
                "Nunito",
                "Oswald",
                "Raleway",
            ].forEach((t) => {
                let i = document.createElement("option");
                (i.value = t),
                    (i.textContent = t),
                    (i.style.fontFamily = t),
                    l.appendChild(i);
            }),
            l.addEventListener("change", () => {
                let t = l.value;
                if (!document.querySelector(`link[data-font="${ t }"]`)) {
                    let i = document.createElement("link");
                    (i.rel = "stylesheet"),
                        (i.href = `https://fonts.googleapis.com/css2?family=${ t.replace(
                            / /g,
                            "+"
                        ) }:wght@400;700&display=swap`),
                        i.setAttribute("data-font", t),
                        document.head.appendChild(i);
                }
                document.execCommand("fontName", !1, t);
            }),
            t.appendChild(l);
        let i = this.createSelect("fontSize", "Font Size", [
            { value: "1", text: "10px" },
            { value: "2", text: "13px" },
            { value: "3", text: "16px", selected: !0 },
            { value: "4", text: "18px" },
            { value: "5", text: "24px" },
            { value: "6", text: "32px" },
            { value: "7", text: "48px" },
        ]);
        return (i.className = "toolbar-select"), t.appendChild(i), t;
    }
    createLineHeightGroup() {
        let t = document.createElement("div");
        t.className = "toolbar-group";
        let l = this.createSelect(
            "lineHeight",
            "Line Height",
            [
                { value: "1", text: "Single" },
                { value: "1.2", text: "1.2" },
                { value: "1.5", text: "1.5" },
                { value: "1.8", text: "1.8" },
                { value: "2", text: "Double" },
            ],
            !0
        );
        return (l.className = "toolbar-select"), t.appendChild(l), t;
    }
    createColorGroup() {
        let t = document.createElement("div");
        t.className = "toolbar-group";
        let l = this.createColorPicker(
            "foreColor",
            "Text Color",
            "fa-font",
            "btn-color"
        );
        t.appendChild(l);
        let i = this.createColorPicker(
            "hiliteColor",
            "Background Color",
            "fa-palette",
            "btn-bgcolor"
        );
        t.appendChild(i);
        let a = this.createButton(
            "removeFormat",
            "fa-broom-wide",
            "Clear Formatting"
        );
        return t.appendChild(a), t;
    }
    createAlignmentGroup() {
        let t = document.createElement("div");
        t.className = "toolbar-group";
        let l = this.createSelect("formatBlock", "Block Format", [
            { value: "P", text: "Paragraph" },
            { value: "H1", text: "Heading 1" },
            { value: "H2", text: "Heading 2" },
            { value: "H3", text: "Heading 3" },
            { value: "H4", text: "Heading 4" },
            { value: "H5", text: "Heading 5" },
            { value: "H6", text: "Heading 6" },
            { value: "BLOCKQUOTE", text: "Quote" },
        ]);
        return (
            t.appendChild(l),
            [
                {
                    command: "justifyLeft",
                    icon: "fa-align-left",
                    title: "Align Left",
                    class: "btn-align-left",
                },
                {
                    command: "justifyCenter",
                    icon: "fa-align-center",
                    title: "Align Center",
                    class: "btn-align-center",
                },
                {
                    command: "justifyRight",
                    icon: "fa-align-right",
                    title: "Align Right",
                    class: "btn-align-right",
                },
            ].forEach((l) => {
                let i = this.createButton(l.command, l.icon, l.title, l.class);
                t.appendChild(i);
            }),
            t
        );
    }
    createListGroup() {
        let t = document.createElement("div");
        return (
            (t.className = "toolbar-group"),
            [
                {
                    command: "insertUnorderedList",
                    icon: "fa-list-ul",
                    title: "Bullet List",
                    class: "btn-list",
                },
                {
                    command: "insertOrderedList",
                    icon: "fa-list-ol",
                    title: "Numbered List",
                    class: "btn-list",
                },
                {
                    command: "insertCheckboxList",
                    icon: "fa-square-check",
                    title: "Checkbox List",
                    class: "btn-list",
                    custom: !0,
                },
                {
                    command: "indent",
                    icon: "fa-indent",
                    title: "Indent",
                    class: "btn-indent",
                },
                {
                    command: "outdent",
                    icon: "fa-outdent",
                    title: "Outdent",
                    class: "btn-outdent",
                },
            ].forEach((l) => {
                if (l.custom) {
                    let i = this.createCustomButton(
                        l.command,
                        l.icon,
                        l.title,
                        l.class
                    );
                    t.appendChild(i);
                } else {
                    let a = this.createButton(
                        l.command,
                        l.icon,
                        l.title,
                        l.class
                    );
                    t.appendChild(a);
                }
            }),
            t
        );
    }
    createMediaGroup() {
        let t = document.createElement("div");
        return (
            (t.className = "toolbar-group"),
            [
                {
                    command: "insertLink",
                    icon: "fa-link",
                    title: "Insert Link",
                    class: "btn-link",
                    custom: !0,
                },
                {
                    command: "insertImage",
                    icon: "fa-image",
                    title: "Insert External Image URL",
                    class: "btn-image",
                    custom: !0,
                },
                {
                    command: "insertVideo",
                    icon: "fa-video",
                    title: "Insert External Video URL",
                    class: "btn-video",
                    custom: !0,
                },
                {
                    command: "uploadImage",
                    icon: "fa-upload",
                    title: "Upload Image",
                    class: "btn-upload",
                    custom: !0,
                },
                {
                    command: "uploadVideo",
                    icon: "fa-upload",
                    title: "Upload Video",
                    class: "btn-upload",
                    custom: !0,
                },
            ].forEach((l) => {
                let i = this.createCustomButton(
                    l.command,
                    l.icon,
                    l.title,
                    l.class
                );
                t.appendChild(i);
            }),
            t
        );
    }
    createUtilityGroup() {
        let t = document.createElement("div");
        return (
            (t.className = "toolbar-group"),
            [
                {
                    command: "undo",
                    icon: "fa-arrow-rotate-left",
                    title: "Undo (Ctrl+Z)",
                },
                {
                    command: "redo",
                    icon: "fa-arrow-rotate-right",
                    title: "Redo (Ctrl+Y)",
                },
                {
                    command: "toggleSource",
                    icon: "fa-code",
                    title: "View Source (Ctrl+S)",
                    custom: !0,
                },
            ].forEach((l) => {
                if (l.custom) {
                    let i = this.createCustomButton(l.command, l.icon, l.title);
                    t.appendChild(i);
                } else {
                    let a = this.createButton(l.command, l.icon, l.title);
                    t.appendChild(a);
                }
            }),
            t
        );
    }
    createMoreOptionsGroup() {
        let t = document.createElement("div");
        (t.className = "toolbar-group"),
            [
                { command: "cut", icon: "fa-scissors", title: "Cut (Ctrl+X)" },
                { command: "copy", icon: "fa-copy", title: "Copy (Ctrl+C)" },
                { command: "paste", icon: "fa-paste", title: "Paste (Ctrl+V)" },
                {
                    command: "subscript",
                    icon: "fa-subscript",
                    title: "Subscript",
                },
                {
                    command: "superscript",
                    icon: "fa-superscript",
                    title: "Superscript",
                },
                {
                    command: "insertDate",
                    icon: "fa-calendar-day",
                    title: "Insert Date",
                    custom: !0,
                },
                {
                    command: "insertTime",
                    icon: "fa-clock",
                    title: "Insert Time",
                    custom: !0,
                },
                {
                    command: "insertTitle",
                    icon: "fa-heading",
                    title: "Insert Page Title",
                    custom: !0,
                },
                {
                    command: "insertSpecialChar",
                    icon: "fa-asterisk",
                    title: "Insert Special Character",
                    custom: !0,
                },
            ].forEach((l) => {
                let i = l.custom
                    ? this.createCustomButton(l.command, l.icon, l.title)
                    : this.createButton(l.command, l.icon, l.title);
                t.appendChild(i);
            });
        let l = document.createElement("select");
        return (
            (l.title = "Outline Format"),
            [
                {
                    value: "style1",
                    text: "Roman â†’ Letters â†’ Numeric â†’ letters â†’ roman â†’ bullet",
                },
                {
                    value: "style2",
                    text: "Letters â†’ Numeric â†’ letters â†’ numeric â†’ bullet",
                },
                {
                    value: "style3",
                    text: "Numeric â†’ numeric â†’ letters â†’ bullet",
                },
                {
                    value: "style4",
                    text: "Letters â†’ Roman â†’ letters â†’ roman â†’ bullet",
                },
                {
                    value: "style5",
                    text: "Numeric â†’ letters â†’ numeric â†’ letters â†’ bullet",
                },
                { value: "style6", text: "Numeric with all sublevels" },
                { value: "style7", text: "Bullets (â†’, â†’, â—†, â—)" },
            ].forEach((t) => {
                let i = document.createElement("option");
                (i.value = t.value), (i.textContent = t.text), l.appendChild(i);
            }),
            l.addEventListener("change", () => {
                let t = l.value,
                    i = window.getSelection();
                if (!i.rangeCount) return;
                let a = i.getRangeAt(0).toString();
                if (!a.trim()) return;
                let n = (function l(i, a = 0) {
                    if (!i.length) return null;
                    let n = document.createElement("ol");
                    return (
                        (n.type = 0 === a ? t : "a"),
                        i.forEach((t) => {
                            let s = document.createElement("li");
                            if (
                                ((s.textContent = t),
                                    i.indexOf(t) > 0 && a < i.length - 1)
                            ) {
                                let o = l([i[i.indexOf(t) + 1]], a + 1);
                                o && s.appendChild(o);
                            }
                            n.appendChild(s);
                        }),
                        n
                    );
                })(a.split(/\n/).filter((t) => "" !== t.trim()));
                n && document.execCommand("insertHTML", !1, n.outerHTML);
            }),
            t.appendChild(l),
            t
        );
    }
    createButton(t, l, i, a = "") {
        let n = document.createElement("button");
        return (
            (n.type = "button"),
            (n.className = `toolbar-btn ${ a }`),
            (n.title = i),
            (n.innerHTML = `<i class="fa-regular ${ l }"></i>`),
            n.addEventListener("click", async () => {
                if ("paste" === t)
                    try {
                        let l = await navigator.clipboard.readText();
                        l &&
                            (document.execCommand("insertText", !1, l),
                                this.showSuccessFeedback("Pasted successfully!"));
                    } catch (i) {
                        alert(
                            "Browser blocked paste. Please use Ctrl+V / âŒ˜+V."
                        );
                    }
                else this.execCmd(t);
            }),
            n
        );
    }
    createCustomButton(t, l, i, a = "") {
        let n = document.createElement("button");
        return (
            (n.type = "button"),
            (n.className = `toolbar-btn ${ a }`),
            (n.title = i),
            (n.innerHTML = `<i class="fa-regular ${ l }"></i>`),
            n.addEventListener("click", () => {
                this.execCustomCommand(t);
            }),
            n
        );
    }
    createSelect(t, l, i, a = !1) {
        let n = document.createElement("select");
        return (
            (n.className = "toolbar-select"),
            (n.title = l),
            i.forEach((t) => {
                let l = document.createElement("option");
                (l.value = t.value),
                    (l.textContent = t.text),
                    t.selected && (l.selected = !0),
                    n.appendChild(l);
            }),
            n.addEventListener("change", () => {
                a
                    ? this.execCustomCommand(t, n.value)
                    : this.execCmd(t, n.value);
            }),
            n
        );
    }
    createColorPicker(t, l, i, a) {
        let n = document.createElement("div");
        n.className = "color-picker-container";
        let s = document.createElement("input");
        (s.type = "color"),
            (s.className = `color-picker-${ "foreColor" === t ? "text" : "background"
                }`),
            (s.title = l),
            (s.value = "foreColor" === t ? "#000000" : "#ffff00");
        let o = document.createElement("button");
        return (
            (o.type = "button"),
            (o.className = `toolbar-btn ${ a }`),
            (o.title = l),
            (o.innerHTML = `<i class="fa-regular ${ i }"></i>`),
            s.addEventListener("change", () => {
                this.execCmd(t, s.value);
            }),
            o.addEventListener("click", () => {
                s.click(), this.showSuccessFeedback(`${ l } picker opened`);
            }),
            n.appendChild(s),
            n.appendChild(o),
            n
        );
    }
    createStatusBar() {
        let t = document.createElement("div");
        t.className =
            "rich-status-bar" + (this.options.showStatusBar ? "" : " d-none");
        let l = document.createElement("div");
        (l.className = "word-count"),
            (l.innerHTML =
                'Words: <span id="wordCount">0</span> | Characters: <span id="charCount">0</span>');
        let i = document.createElement("div");
        return (
            (i.innerHTML = `
      <span class="shortcut">Ctrl+B</span>

      <span class="shortcut">Ctrl+I</span>

      <span class="shortcut">Ctrl+U</span>

      <span class="shortcut">Ctrl+Z</span>`),
            t.appendChild(l),
            t.appendChild(i),
            t
        );
    }
    createSuccessToast() {
        let t = document.createElement("div");
        return (
            (t.id = "successToast"),
            (t.className = "success-feedback"),
            (t.innerHTML =
                '<i class="fa-regular fa-check"></i> Action completed successfully!'),
            t
        );
    }
    bindEvents() {
        this.editor.addEventListener("input", () => {
            this.updateWordCount(),
                this.updateButtonStates(),
                this.syncTextarea();
        }),
            this.editor.addEventListener("keyup", () => {
                this.updateWordCount(),
                    this.updateButtonStates(),
                    this.syncTextarea();
            }),
            this.editor.addEventListener("focus", () => {
                this.isEditorFocused = !0;
            }),
            this.editor.addEventListener("blur", () => {
                this.isEditorFocused = !1;
            }),
            this.editor.addEventListener("selectionchange", () => {
                this.updateButtonStates();
            }),
            this.editor.addEventListener("dragover", (t) => {
                t.preventDefault(),
                    (t.dataTransfer.dropEffect = "copy"),
                    this.editor.classList.add("drag-over");
            }),
            this.editor.addEventListener("dragleave", (t) => {
                t.preventDefault(), this.editor.classList.remove("drag-over");
            }),
            this.editor.addEventListener("drop", (t) => {
                t.preventDefault(),
                    this.editor.classList.remove("drag-over"),
                    this.handleFileDrop(t);
            }),
            this.editor.addEventListener("keydown", (t) => {
                if ("Tab" === t.key) {
                    let l = window.getSelection();
                    if (!l.rangeCount) return;
                    let i = l.anchorNode;
                    if (
                        (i.nodeType === Node.TEXT_NODE && (i = i.parentElement),
                            i ? i.closest("li") : null)
                    ) {
                        t.preventDefault();
                        let a = this.toolbar.querySelector(
                            'select[title="Outline Format"]'
                        ),
                            n = a ? a.value : "";
                        this.handleOutlineChange(n);
                    }
                }
                if("Control" === t.key){
                    this.handleKeyboardShortcuts(t);
                }
            }),
            this.editor.addEventListener("click", (t) => {
                let l = t.target;
                l && "IMG" === l.tagName
                    ? (t.preventDefault(),
                        t.stopPropagation(),
                        this.showImageMenu(l))
                    : this.hideImageMenu();
            }),
            document.addEventListener("click", (t) => {
                this.imageMenu &&
                    "block" === this.imageMenu.style.display &&
                    !this.imageMenu.contains(t.target) &&
                    "IMG" !== t.target.tagName &&
                    this.hideImageMenu();
            });
    }
    handleOutlineChange(t) {
        if (!t) return;
        let l = window.getSelection();
        if (!l.rangeCount) return;
        let i = l.anchorNode;
        i.nodeType === Node.TEXT_NODE && (i = i.parentElement);
        let a = i ? i.closest("li") : null,
            n = l.getRangeAt(0).cloneContents(),
            s = [];
        if (
            (n.querySelectorAll("li").forEach((t) => {
                let l = t.innerText.trim();
                l && s.push(l);
            }),
                0 === s.length)
        ) {
            let o = "";
            n.childNodes.forEach((t) => {
                t.nodeType === Node.TEXT_NODE
                    ? (o += t.textContent)
                    : "BR" === t.nodeName ||
                        "DIV" === t.nodeName ||
                        "P" === t.nodeName
                        ? (o += "\n" + (t.innerText || t.textContent))
                        : (o += t.innerText || t.textContent);
            }),
                (s = o
                    .split(/\n/)
                    .map((t) => t.trim())
                    .filter((t) => "" !== t));
        }
        if ((console.log(s), "option1" === t)) {
            let r =
                ["I", "A", "1", "i", "a", "1", "disc"][
                a ? this.getListDepth(a) : 1
                ] || "disc",
                d = "";
            (d = ["disc", "circle", "square"].includes(r)
                ? `<ul style="list-style-type:${ r };"><li></li></ul>`
                : `<ol type="${ r }"><li></li></ol>`),
                a
                    ? (a.innerHTML += d)
                    : document.execCommand("insertHTML", !1, d);
            return;
        }
        if ("option2" === t) {
            let c =
                ["A", "1", "a", "1", "disc"][
                a ? this.getListDepth(a) : 1
                ] || "disc",
                u = "";
            (u = ["disc", "circle", "square"].includes(c)
                ? `<ul style="list-style-type:${ c };"><li></li></ul>`
                : `<ol type="${ c }"><li></li></ol>`),
                a
                    ? (a.innerHTML += u)
                    : document.execCommand("insertHTML", !1, u);
            return;
        }
        if ("option3" === t) {
            let p =
                ["1", "a", "1", "disc"][a ? this.getListDepth(a) : 1] ||
                "disc",
                h = "";
            (h = ["disc", "circle", "square"].includes(p)
                ? `<ul style="list-style-type:${ p };"><li></li></ul>`
                : `<ol type="${ p }"><li></li></ol>`),
                a
                    ? (a.innerHTML += h)
                    : document.execCommand("insertHTML", !1, h);
            return;
        }
        if ("option4" === t) {
            let m =
                ["A", "I", "a", "i", "disc"][
                a ? this.getListDepth(a) : 1
                ] || "disc",
                g = "";
            (g = ["disc", "circle", "square"].includes(m)
                ? `<ul style="list-style-type:${ m };"><li></li></ul>`
                : `<ol type="${ m }"><li></li></ol>`),
                a
                    ? (a.innerHTML += g)
                    : document.execCommand("insertHTML", !1, g);
            return;
        }
        if ("option5" === t) {
            let x =
                ["1", "a", "1", "A", "disc"][
                a ? this.getListDepth(a) : 1
                ] || "disc",
                b = "";
            (b = ["disc", "circle", "square"].includes(x)
                ? `<ul style="list-style-type:${ x };"><li></li></ul>`
                : `<ol type="${ x }"><li></li></ol>`),
                a
                    ? (a.innerHTML += b)
                    : document.execCommand("insertHTML", !1, b);
            return;
        }
        if ("option6" === t) {
            let y = [0, 0, 0, 0, 0],
                f = a ? this.getListDepth(a) : 1;
            for (let C = f; C < y.length; C++) y[C] = 0;
            y[f - 1]++,
                y
                    .slice(0, f)
                    .filter((t) => t > 0)
                    .join("."),
                a && a.innerText.trim();
            let D = a ? a.querySelector("ol") : null;
            !D &&
                a &&
                ((D = document.createElement("ol")).classList.add(
                    "decimal-list",
                    "pointdesimal"
                ),
                    a.appendChild(D));
            let $ = document.createElement("li");
            ($.innerHTML = ""),
                $.style.setProperty("--before-margin", `${ -(20 * f) }px`),
                D
                    ? D.appendChild($)
                    : document.execCommand("insertHTML", !1, $.outerHTML);
            return;
        }
        if ("option7" === t) {
            let E = ["â–¶", "â†’", "â—†", "â€¢"][a ? this.getListDepth(a) : 1] || "â€¢",
                v = "";
            (v = ["â–¶", "â†’", "â—†", "â€¢"].includes(E)
                ? `<ul style="list-style-type:'${ E }';"><li></li></ul>`
                : `<ol type="${ E }"><li></li></ol>`),
                a
                    ? (a.innerHTML += v)
                    : document.execCommand("insertHTML", !1, v);
            return;
        }
        e.shiftKey
            ? document.execCommand("outdent")
            : document.execCommand("indent");
    }
    getListDepth(t) {
        let l = 0,
            i = t;
        for (; i;)
            ("OL" === i.tagName || "UL" === i.tagName) && l++,
                (i = i.parentElement);
        return l;
    }
    execCmd(t, l = null) {
        if (
            (this.isEditorFocused || this.editor.focus(),
                "formatBlock" === t &&
                ["H1", "H2", "H3", "H4", "H5", "H6"].includes(l))
        ) {
            let i = window.getSelection();
            if (0 === i.rangeCount) return;
            let a = i.getRangeAt(0),
                n = a.toString(),
                s = a.startContainer,
                o = null;
            for (; s && s !== this.editor;) {
                if (
                    s.nodeType === Node.ELEMENT_NODE &&
                    ["H1", "H2", "H3", "H4", "H5", "H6"].includes(s.tagName)
                ) {
                    o = s;
                    break;
                }
                s = s.parentNode;
            }
            if (n) {
                if (o && o.tagName !== l) {
                    let r = o.textContent,
                        d = document.createElement(l);
                    (d.textContent = r),
                        o.parentNode.replaceChild(d, o),
                        i.removeAllRanges();
                    let c = document.createRange();
                    c.selectNodeContents(d), i.addRange(c);
                } else {
                    let u = document.createElement(l);
                    (u.textContent = n),
                        a.deleteContents(),
                        a.insertNode(u),
                        i.removeAllRanges();
                    let p = document.createRange();
                    p.setStartAfter(u), p.collapse(!0), i.addRange(p);
                }
            } else document.execCommand(t, !1, l);
        } else document.execCommand(t, !1, l);
        if (
            [
                "bold",
                "italic",
                "underline",
                "strikeThrough",
                "justifyLeft",
                "justifyCenter",
                "justifyRight",
                "insertUnorderedList",
                "insertOrderedList",
                "subscript",
                "superscript",
            ].includes(t)
        ) {
            let h = !1;
            try {
                h = document.queryCommandState(t);
            } catch (m) { }
            h
                ? this.showSuccessFeedback(`${ t } applied`)
                : this.showSuccessFeedback(`${ t } removed`);
        } else this.showSuccessFeedback(`${ t } applied`);
        setTimeout(() => {
            this.updateButtonStates();
        }, 10),
            this.syncTextarea();
    }
    execCustomCommand(t, l = null) {
        switch (t) {
            case "insertLink":
                this.insertLink();
                break;
            case "unLink":
                this.unlink();
                break;
            case "insertImage":
                this.insertImage();
                break;
            case "insertVideo":
                this.insertVideo();
                break;
            case "insertCheckboxList":
                this.insertCheckboxList();
                break;
            case "toggleSource":
                this.toggleSource();
                break;
            case "uploadImage":
                this.imageFileInput.click();
                break;
            case "uploadVideo":
                this.videoFileInput.click();
                break;
            case "insertDate":
                let i = new Date().toLocaleDateString();
                document.execCommand("insertText", !1, i);
                break;
            case "insertTime":
                let a = new Date().toLocaleTimeString();
                document.execCommand("insertText", !1, a);
                break;
            case "insertTitle":
                let n = document.title || "Untitled Page";
                document.execCommand("insertText", !1, n);
                break;
            case "insertSpecialChar":
                let s = prompt(
                    "Enter special character (e.g. \xa9, \xae, â‚¬, âœ“, â†’):",
                    "\xa9"
                );
                s && document.execCommand("insertText", !1, s);
                break;
            case "lineHeight":
                this.setLineHeight(l);
                break;
            case "insertTable":
                this.insertTable();
                break;
            case "insertCalendar":
                this.showCalendarPopup();
                break;
            case "insertEmoji":
                this.showEmojiPopup();
                break;
            case "insertLayout":
                this.showLayoutPopup();
        }
    }
    setLineHeight(t) {
        this.isEditorFocused || this.editor.focus();
        let l = window.getSelection();
        if (!l.rangeCount) return;
        let i = l.getRangeAt(0).startContainer;
        i.nodeType === Node.TEXT_NODE && (i = i.parentElement);
        let a = i.closest("p, div, h1, h2, h3, h4, h5, h6, li");
        a
            ? (a.style.lineHeight = t)
            : document.execCommand(
                "insertHTML",
                !1,
                `<div style="line-height:${ t };">${ l }</div>`
            ),
            this.showSuccessFeedback(`Line height set to ${ t }`),
            this.syncTextarea();
    }
    insertLink() {
        let t = prompt("Enter the link URL:", "https://");
        if (t) {
            let l = confirm("Open in new tab?");
            if ((document.execCommand("createLink", !1, t), l)) {
                let i = this.editor.getElementsByTagName("a");
                i.length && i[i.length - 1].setAttribute("target", "_blank");
            }
            this.showSuccessFeedback("Link inserted successfully"),
                this.syncTextarea();
        }
    }
    unlink() {
        let t = window.getSelection();
        if (!t.rangeCount) {
            this.showSuccessFeedback("No text selected to unlink");
            return;
        }
        let l = t.anchorNode;
        for (; l && 3 === l.nodeType;) l = l.parentNode;
        l && "A" === l.tagName
            ? (document.execCommand("unlink", !1, null),
                this.showSuccessFeedback("Link removed successfully"),
                this.syncTextarea())
            : this.showSuccessFeedback("Selection is not inside a link");
    }
    showCalendarPopup() {
        let t = document.getElementById("calendarPopup");
        t && t.remove();
        let l = document.createElement("div");
        (l.id = "calendarPopup"),
            (l.style.cssText =
                "position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);background: white;border: 1px solid #ccc;border-radius: 8px;box-shadow: 0 4px 15px rgba(0,0,0,0.2);padding: 10px;z-index: 9999;");
        let i = document.createElement("div");
        (i.style.textAlign = "center"), (i.style.marginBottom = "10px");
        let a = new Date(),
            n = a.getMonth(),
            s = a.getFullYear(),
            o = document.createElement("span");
        o.style.fontWeight = "bold";
        let r = document.createElement("button");
        (r.textContent = "<"), (r.style.marginRight = "10px");
        let d = document.createElement("button");
        (d.textContent = ">"),
            (d.style.marginLeft = "10px"),
            i.appendChild(r),
            i.appendChild(o),
            i.appendChild(d),
            l.appendChild(i);
        let c = document.createElement("div");
        (c.style.display = "grid"),
            (c.style.gridTemplateColumns = "repeat(7, 40px)"),
            (c.style.gap = "5px"),
            l.appendChild(c);
        let u = () => {
            (c.innerHTML = ""),
                (o.textContent = `${ new Date(s, n).toLocaleString("default", {
                    month: "long",
                }) } ${ s }`);
            let t = new Date(s, n, 1).getDay(),
                i = new Date(s, n + 1, 0).getDate();
            ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"].forEach((t) => {
                let l = document.createElement("div");
                (l.textContent = t),
                    (l.style.textAlign = "center"),
                    (l.style.fontWeight = "bold"),
                    c.appendChild(l);
            });
            for (let a = 0; a < t; a++)
                c.appendChild(document.createElement("div"));
            for (let r = 1; r <= i; r++) {
                let d = document.createElement("button");
                (d.textContent = r),
                    (d.style.padding = "5px"),
                    (d.style.cursor = "pointer"),
                    d.addEventListener("click", () => {
                        let t = new Date(s, n, r).toLocaleDateString(void 0, {
                            year: "numeric",
                            month: "long",
                            day: "numeric",
                        });
                        document.execCommand("insertText", !1, t),
                            this.showSuccessFeedback("Calendar date inserted"),
                            this.syncTextarea(),
                            l.remove();
                    }),
                    c.appendChild(d);
            }
        };
        r.addEventListener("click", () => {
            --n < 0 && ((n = 11), s--), u();
        }),
            d.addEventListener("click", () => {
                ++n > 11 && ((n = 0), s++), u();
            }),
            u();
        let p = document.createElement("button");
        (p.textContent = "Cancel"),
            (p.style.cssText =
                "display:block;margin:10px auto 0;padding:6px 12px;background:#6c757d;color:white;border:none;border-radius:4px;cursor:pointer;"),
            p.addEventListener("click", () => l.remove()),
            l.appendChild(p),
            document.body.appendChild(l);
    }
    insertTable() {
        let t = document.createElement("div");
        (t.className = "table-insert-dialog"),
            (t.style.cssText =
                "position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);background: white;padding: 20px;border-radius: 8px;box-shadow: 0 4px 20px rgba(0,0,0,0.15);z-index: 10000;min-width: 300px;");
        let l = document.createElement("div");
        l.style.cssText =
            "display: grid;grid-template-columns: repeat(10, 20px);grid-template-rows: repeat(8, 20px);gap: 2px;margin-bottom: 15px;";
        let i = 3,
            a = 3;
        for (let n = 0; n < 8; n++)
            for (let s = 0; s < 10; s++) {
                let o = document.createElement("div");
                (o.style.cssText = `width: 20px;height: 20px;border: 1px solid #ddd;cursor: pointer;background: ${ n < i && s < a ? "#007bff" : "#f8f9fa"
                    };`),
                    (o.dataset.row = n),
                    (o.dataset.col = s),
                    o.addEventListener("mouseover", () => {
                        let t = parseInt(o.dataset.row) + 1,
                            i = parseInt(o.dataset.col) + 1;
                        l.querySelectorAll("div").forEach((l) => {
                            let a = parseInt(l.dataset.row),
                                n = parseInt(l.dataset.col);
                            l.style.background =
                                a < t && n < i ? "#007bff" : "#f8f9fa";
                        }),
                            (r.textContent = `${ t } \xd7 ${ i }`);
                    }),
                    o.addEventListener("click", () => {
                        (i = parseInt(o.dataset.row) + 1),
                            (a = parseInt(o.dataset.col) + 1),
                            this.createTable(i, a),
                            document.body.removeChild(t);
                    }),
                    l.appendChild(o);
            }
        let r = document.createElement("div");
        (r.textContent = "3 \xd7 3"),
            (r.style.cssText =
                "text-align: center;margin-bottom: 10px;font-weight: bold;");
        let d = document.createElement("button");
        (d.textContent = "Cancel"),
            (d.style.cssText =
                "padding: 8px 16px;background: #6c757d;color: white;border: none;border-radius: 4px;cursor: pointer;margin-top: 10px;width: 100%;"),
            d.addEventListener("click", () => {
                document.body.removeChild(t);
            }),
            t.appendChild(
                (document.createElement("div").textContent =
                    "Select Table Size:")
            ),
            t.appendChild(r),
            t.appendChild(l),
            t.appendChild(d),
            document.body.appendChild(t);
        let c = (l) => {
            t.contains(l.target) ||
                (document.body.removeChild(t),
                    document.removeEventListener("click", c));
        };
        setTimeout(() => {
            document.addEventListener("click", c);
        }, 0);
    }
    insertImage() {
        let t = prompt("Enter image URL:");
        if (t) {
            document.execCommand("insertImage", !1, t);
            let l = this.editor.querySelector("img:last-of-type");
            l &&
                ((l.className = "resizable-image"), this.makeImageResizable(l)),
                this.showSuccessFeedback("Image inserted successfully"),
                this.syncTextarea();
        }
    }
    _createCustomButtonInternal(t, l, i, a) {
        let n = document.createElement("button");
        return (
            (n.type = "button"),
            (n.className = "toolbar-btn " + (a || "")),
            (n.title = i || ""),
            (n.innerHTML = `<i class="fa ${ l }"></i>`),
            n.addEventListener("click", (l) => {
                l.preventDefault(),
                    l.stopPropagation(),
                    this.handleToolbarCommand?.(t, n);
            }),
            n
        );
    }
    createMediaGroupWithGallery() {
        let t = document.createElement("div");
        if (
            ((t.className = "toolbar-group"),
                [
                    {
                        command: "insertLink",
                        icon: "fa-link",
                        title: "Insert Link",
                        class: "btn-link",
                        custom: !0,
                    },
                    {
                        command: "unLink",
                        icon: "fa-unlink",
                        title: "Remove Link",
                        class: "btn-link",
                        custom: !0,
                    },
                    {
                        command: "insertImage",
                        icon: "fa-image",
                        title: "Insert External Image URL",
                        class: "btn-image",
                        custom: !0,
                    },
                    {
                        command: "insertVideo",
                        icon: "fa-video",
                        title: "Insert External Video URL",
                        class: "btn-video",
                        custom: !0,
                    },
                    {
                        command: "uploadImage",
                        icon: "fa-upload",
                        title: "Upload Image",
                        class: "btn-upload",
                        custom: !0,
                    },
                    {
                        command: "uploadVideo",
                        icon: "fa-upload",
                        title: "Upload Video",
                        class: "btn-upload",
                        custom: !0,
                    },
                ].forEach((l) => {
                    let i = (
                        "function" == typeof this.createCustomButton
                            ? this.createCustomButton
                            : this._createCustomButtonInternal
                    ).call(this, l.command, l.icon, l.title, l.class);
                    t.appendChild(i);
                }),
                this.options.galleryApiUrl &&
                "string" == typeof this.options.galleryApiUrl &&
                "" !== this.options.galleryApiUrl.trim())
        ) {
            let l = document.createElement("button");
            (l.type = "button"),
                (l.className = "toolbar-btn btn-gallery"),
                (l.title = "Insert from Gallery"),
                (l.innerHTML = '<i class="fa-regular fa-images"></i>'),
                l.addEventListener("click", (t) => {
                    t.preventDefault(),
                        t.stopPropagation(),
                        this.openGallerySelectionModal();
                }),
                t.appendChild(l);
        }
        return t;
    }
    openGallerySelectionModal() {
        this._saveSelection(),
            RichTextEditor.galleryModalSingleton
                ? ((RichTextEditor.galleryModalSingleton.rteInstance = this),
                    RichTextEditor.galleryModalSingleton.showModal())
                : alert("Gallery modal is not available.");
    }
    _saveSelection() {
        let t = window.getSelection();
        if (!t.rangeCount) return (this._savedRange = null);
        let l = t.getRangeAt(0);
        this.editor.contains(l.commonAncestorContainer)
            ? (this._savedRange = l.cloneRange())
            : (this._savedRange = null);
    }
    _restoreSelection() {
        if (!this._savedRange) return;
        let t = window.getSelection();
        t.removeAllRanges(), t.addRange(this._savedRange);
    }
    createGallerySelectionModal() {
        let t = document.createElement("div");
        (t.className = "rich-text-gallery-modal rtemodal-hidden"),
            (t.style.cssText =
                "position: fixed;top:0; left:0; right:0; bottom:0;background: rgba(0,0,0,0.35);display: flex;align-items: center;justify-content: center;z-index: 20005;transition: opacity .2s;");
        let l = document.createElement("div");
        l.style.cssText =
            "background: #fff;border-radius: 9px;box-shadow: 0 8px 40px rgba(0,0,0,0.22);min-width: 75%; max-width: 95vw;max-height: 90vh; overflow: auto; padding: 24px 22px; position:relative;";
        let i = document.createElement("div");
        (i.style.cssText =
            "font-size:18px;font-weight:bold;margin-bottom:8px;display:flex;align-items:center;gap:10px;"),
            (i.innerHTML =
                '<i class="fa-regular fa-images"></i> Select image from Gallery <span style="flex:1"></span>');
        let a = document.createElement("button");
        (a.innerHTML = "&times;"),
            (a.type = "button"),
            (a.style.cssText =
                "background:none;border:none;font-size:30px;font-weight:bold;line-height:1;cursor:pointer;color:#7a7a7a"),
            (a.onclick = () => t.hideModal()),
            i.appendChild(a),
            l.appendChild(i);
        let n = document.createElement("div");
        (n.className = "rte-gallery-grid"),
            (n.style.cssText =
                "display: grid;grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));gap: 20px;margin: 12px 0 14px 0;"),
            l.appendChild(n);
        let s = document.createElement("div");
        (s.style.cssText = "padding:15px;color:#888;text-align:center;"),
            l.appendChild(s);
        let o = document.createElement("div");
        (o.style.cssText =
            "display:flex;gap:8px;align-items:center;justify-content:center;padding-bottom:7px"),
            l.appendChild(o),
            t.appendChild(l),
            (t.showModal = function () {
                t.classList.remove("rtemodal-hidden"), this.loadImages();
            }),
            (t.hideModal = function () {
                t.classList.add("rtemodal-hidden"),
                    (n.innerHTML = ""),
                    (s.textContent = ""),
                    (o.innerHTML = "");
            }),
            (t.rteInstance = null);
        let r = 1,
            d = 1;
        if (
            ((t.loadImages = function (l = 1) {
                (n.innerHTML = ""),
                    (s.textContent = "Loading images..."),
                    (o.innerHTML = ""),
                    (r = l),
                    (async () => {
                        try {
                            let i =
                                RichTextEditor.galleryModalAPI ||
                                (this.rteInstance
                                    ? this.rteInstance.options.galleryApiUrl
                                    : "");
                            if (!i) throw Error("No API set");
                            let a = i;
                            a.includes("?") || (a += "?"),
                                a.endsWith("?") ||
                                a.endsWith("&") ||
                                (a += "&");
                            let r = await fetch(
                                (a += "page=" + encodeURIComponent(l)),
                                { credentials: "same-origin" }
                            );
                            if (!r.ok) throw Error("Failed to load images");
                            let c = await r.json(),
                                u = Array.isArray(c.images)
                                    ? c.images
                                    : Array.isArray(c.data)
                                        ? c.data
                                        : [];
                            if (!u || !u.length) {
                                s.textContent = "No images found.";
                                return;
                            }
                            (n.innerHTML = ""),
                                u.forEach((l, i) => {
                                    let a =
                                        l.url ||
                                        l.src ||
                                        l.image_url ||
                                        l.image ||
                                        l.path ||
                                        l;
                                    if (!a) return;
                                    let s = document.createElement("div");
                                    s.style.cssText =
                                        "padding:6px;background:#fcfcfc;border-radius:7px;border:1.5px solid #ececec;cursor:pointer;display:flex;align-items:center;justify-content:center;";
                                    let o = document.createElement("img");
                                    (o.src = a),
                                        (o.alt = l.alt || l.name || ""),
                                        (o.style.cssText =
                                            "max-width:120px;max-height:90px;margin-bottom:4px;object-fit:contain;border-radius:6px;border:1px solid #eee;"),
                                        (o.loading = "lazy"),
                                        s.appendChild(o),
                                        (s.onclick = () => {
                                            t.rteInstance &&
                                                (t.rteInstance.insertImageAtCursorFromUrl(
                                                    a
                                                ),
                                                    t.hideModal());
                                        }),
                                        n.appendChild(s);
                                }),
                                (s.textContent = "");
                            let p = 1,
                                h = 1,
                                m = 0;
                            if (
                                (c.page && c.last_page
                                    ? ((p = +c.page),
                                        (h = +c.last_page),
                                        (m = c.total ? +c.total : null))
                                    : c.meta &&
                                        c.meta.current_page &&
                                        c.meta.last_page
                                        ? ((p = +c.meta.current_page),
                                            (h = +c.meta.last_page),
                                            (m = c.meta.total ? +c.meta.total : null))
                                        : c.pagination &&
                                        c.pagination.current_page &&
                                        c.pagination.last_page &&
                                        ((p = +c.pagination.current_page),
                                            (h = +c.pagination.last_page),
                                            (m = c.pagination.total
                                                ? +c.pagination.total
                                                : null)),
                                    (d = h),
                                    h > 1)
                            ) {
                                o.innerHTML = "";
                                let g = document.createElement("button");
                                (g.textContent = "<"),
                                    (g.disabled = p <= 1),
                                    (g.style.cssText =
                                        "padding:3px 8px;font-size:15px;margin-right:10px"),
                                    (g.onclick = () => {
                                        p > 1 && t.loadImages(p - 1);
                                    });
                                let x = document.createElement("button");
                                (x.textContent = ">"),
                                    (x.disabled = p >= h),
                                    (x.style.cssText =
                                        "padding:3px 8px;font-size:15px;margin-left:10px"),
                                    (x.onclick = () => {
                                        p < h && t.loadImages(p + 1);
                                    });
                                let b = document.createElement("span");
                                (b.textContent = `Page ${ p } of ${ h }`),
                                    o.appendChild(g),
                                    o.appendChild(b),
                                    o.appendChild(x);
                            }
                        } catch (y) {
                            s.textContent =
                                "Could not load images. " +
                                (y && y.message ? y.message : "");
                        }
                    })();
            }),
                !document.getElementById("rteGalleryModalCSS"))
        ) {
            let c = document.createElement("style");
            (c.id = "rteGalleryModalCSS"),
                (c.textContent =
                    ".rtemodal-hidden {opacity:0 !important;pointer-events:none;}.rich-text-gallery-modal {opacity:1;}.rich-text-gallery-modal img {transition:box-shadow .18s;}.rich-text-gallery-modal img:hover {box-shadow:0 2px 10px #008ad04e;}@media (max-width:550px) {.rich-text-gallery-modal > div {min-width:0;max-width:99vw;padding:10px 3vw;}.rte-gallery-grid {grid-template-columns: repeat(auto-fit, minmax(80px,1fr)); gap:7px;}}"),
                document.head.appendChild(c);
        }
        return (
            t.addEventListener("keydown", function (l) {
                ("Escape" === l.key || "Esc" === l.key) && t.hideModal();
            }),
            t.addEventListener("mousedown", function (l) {
                l.target === t && t.hideModal();
            }),
            t
        );
    }
    insertImageAtCursorFromUrl(t) {
        if ((this.editor.focus(), this._savedRange)) {
            let l = window.getSelection();
            l.removeAllRanges(),
                l.addRange(this._savedRange),
                (this._savedRange = null);
        }
        let i = document.createElement("img");
        if (
            ((i.src = t),
                (i.alt = ""),
                (i.className = "resizable-image"),
                (i.style.maxWidth = "100%"),
                (i.style.height = "auto"),
                window.getSelection && window.getSelection().rangeCount > 0)
        ) {
            let a = window.getSelection().getRangeAt(0);
            a.deleteContents(), a.insertNode(i);
        } else this.editor.appendChild(i);
        "function" == typeof this.makeImageResizable &&
            this.makeImageResizable(i),
            setTimeout(() => {
                this.showSuccessFeedback("Image inserted from gallery"),
                    this.syncTextarea();
            }, 0);
    }
    insertVideo() {
        let t = prompt("Enter video URL:");
        if (t) {
            let l = `<video controls src="${ t }"></video>`;
            document.execCommand("insertHTML", !1, l),
                this.showSuccessFeedback("Video inserted successfully"),
                this.syncTextarea();
        }
    }
    insertCheckboxList() {
        document.execCommand(
            "insertHTML",
            !1,
            '<ul><li><input type="checkbox"> Task 1</li><li><input type="checkbox"> Task 2</li></ul>'
        ),
            this.showSuccessFeedback("Checkbox list inserted"),
            this.syncTextarea();
    }
    handleImageUpload(t) {
        let l = t.target.files[0];
        if (l) {
            if (l.type.startsWith("image/")) {
                let i = new FileReader();
                (i.onload = (t) => {
                    let i = document.createElement("img");
                    (i.src = t.target.result),
                        (i.style.maxWidth = "100%"),
                        (i.style.height = "auto"),
                        (i.alt = l.name),
                        (i.className = "resizable-image"),
                        document.execCommand("insertHTML", !1, i.outerHTML);
                    let a = this.editor.querySelector("img:last-of-type");
                    a && this.makeImageResizable(a),
                        this.showSuccessFeedback("Image uploaded successfully"),
                        this.syncTextarea();
                }),
                    i.readAsDataURL(l);
            } else this.showSuccessFeedback("Please select a valid image file");
        }
        t.target.value = "";
    }
    handleVideoUpload(t) {
        let l = t.target.files[0];
        if (l) {
            if (l.type.startsWith("video/")) {
                let i = new FileReader();
                (i.onload = (t) => {
                    let l = document.createElement("video");
                    (l.src = t.target.result),
                        (l.controls = !0),
                        (l.style.maxWidth = "100%"),
                        (l.style.height = "auto"),
                        document.execCommand("insertHTML", !1, l.outerHTML),
                        this.showSuccessFeedback("Video uploaded successfully"),
                        this.syncTextarea();
                }),
                    i.readAsDataURL(l);
            } else this.showSuccessFeedback("Please select a valid video file");
        }
        t.target.value = "";
    }
    handleFileDrop(t) {
        let l = t.dataTransfer.files;
        l.length > 0 &&
            Array.from(l).forEach((t) => {
                t.type.startsWith("image/")
                    ? this.insertDroppedImage(t)
                    : t.type.startsWith("video/")
                        ? this.insertDroppedVideo(t)
                        : this.showSuccessFeedback(
                            `File type ${ t.type } is not supported`
                        );
            });
    }
    insertDroppedImage(t) {
        let l = new FileReader();
        (l.onload = (l) => {
            let i = document.createElement("img");
            (i.src = l.target.result),
                (i.style.maxWidth = "100%"),
                (i.style.height = "auto"),
                (i.alt = t.name),
                (i.className = "resizable-image"),
                document.execCommand("insertHTML", !1, i.outerHTML);
            let a = this.editor.querySelector("img:last-of-type");
            a && this.makeImageResizable(a),
                this.showSuccessFeedback("Image dropped successfully"),
                this.syncTextarea();
        }),
            l.readAsDataURL(t);
    }
    insertDroppedVideo(t) {
        let l = new FileReader();
        (l.onload = (t) => {
            let l = document.createElement("video");
            (l.src = t.target.result),
                (l.controls = !0),
                (l.style.maxWidth = "100%"),
                (l.style.height = "auto"),
                document.execCommand("insertHTML", !1, l.outerHTML),
                this.showSuccessFeedback("Video dropped successfully"),
                this.syncTextarea();
        }),
            l.readAsDataURL(t);
    }
    makeImageResizable(t) {
        t.classList.add("resizable-image"),
            (t.style.position = "relative"),
            (t.style.display = "inline-block"),
            ["nw", "ne", "sw", "se"].forEach((l) => {
                let i = document.createElement("div");
                switch (
                ((i.className = `resize-handle resize-${ l }`),
                    (i.style.cssText = `position: absolute;width: 10px;height: 10px;background: #007bff;border: 2px solid white;border-radius: 50%;cursor: ${ "nw" === l || "se" === l ? "nw-resize" : "ne-resize"
                        };z-index: 1000;`),
                    l)
                ) {
                    case "nw":
                        (i.style.top = "-5px"), (i.style.left = "-5px");
                        break;
                    case "ne":
                        (i.style.top = "-5px"), (i.style.right = "-5px");
                        break;
                    case "sw":
                        (i.style.bottom = "-5px"), (i.style.left = "-5px");
                        break;
                    case "se":
                        (i.style.bottom = "-5px"), (i.style.right = "-5px");
                }
                this.addResizeHandleDrag(i, t, l), t.appendChild(i);
            }),
            t.addEventListener("mouseenter", () => this.showResizeHandles(t)),
            t.addEventListener("mouseleave", () => this.hideResizeHandles(t)),
            t.addEventListener("focus", () => this.showResizeHandles(t)),
            t.addEventListener("blur", () => this.hideResizeHandles(t));
    }
    addResizeHandleDrag(t, l, i) {
        let a = !1,
            n,
            s,
            o,
            r;
        t.addEventListener("mousedown", (t) => {
            t.preventDefault(),
                t.stopPropagation(),
                (a = !0),
                (n = t.clientX),
                (s = t.clientY),
                (o = l.offsetWidth),
                (r = l.offsetHeight),
                document.addEventListener("mousemove", d),
                document.addEventListener("mouseup", c);
        });
        let d = (t) => {
            if (!a) return;
            let d = t.clientX - n,
                c = t.clientY - s,
                u = o,
                p = r;
            switch (i) {
                case "se":
                    (u = o + d), (p = r + c);
                    break;
                case "sw":
                    (u = o - d), (p = r + c);
                    break;
                case "ne":
                    (u = o + d), (p = r - c);
                    break;
                case "nw":
                    (u = o - d), (p = r - c);
            }
            (u = Math.max(50, u)),
                (p = Math.max(50, p)),
                (u = Math.min(800, u)),
                (p = Math.min(600, p)),
                (l.style.width = u + "px"),
                (l.style.height = p + "px"),
                (l.style.maxWidth = "none"),
                this.syncTextarea();
        },
            c = () => {
                (a = !1),
                    document.removeEventListener("mousemove", d),
                    document.removeEventListener("mouseup", c);
            };
    }
    showResizeHandles(t) {
        t.querySelectorAll(".resize-handle").forEach((t) => {
            t.style.display = "block";
        });
    }
    hideResizeHandles(t) {
        t.querySelectorAll(".resize-handle").forEach((t) => {
            t.style.display = "none";
        });
    }
    makeExistingImagesResizable() {
        this.editor.querySelectorAll("img").forEach((t) => {
            t.classList.contains("resizable-image") ||
                this.makeImageResizable(t);
        });
    }
    showImageMenu(t) {
        if (!t || "IMG" !== t.tagName) return;
        this.selectedImage = t;
        let l = t.getBoundingClientRect(),
            i = this.imageMenu.offsetHeight || 300,
            a = l.top + window.scrollY - i - 10,
            n = l.left + window.scrollX;
        a < 0 && (a = l.bottom + window.scrollY + 10);
        let s = this.imageMenu.offsetWidth || 250;
        n + s > window.innerWidth && (n = window.innerWidth - s - 10),
            (this.imageMenu.style.left = n + "px"),
            (this.imageMenu.style.top = a + "px"),
            (this.imageMenu.style.display = "block");
        let o = this.imageMenu.querySelector('input[type="text"]');
        (o.value = t.alt || ""), o.focus();
    }
    toggleSource() {
        let t = document.getElementById("source");
        "none" === this.editor.style.display
            ? (t && ((this.editor.innerHTML = t.value), t.remove()),
                (this.editor.style.display = "block"),
                this.editor.focus(),
                this.showSuccessFeedback("Source view disabled"),
                this.updateWordCount(),
                this.syncTextarea())
            : (((t = document.createElement("textarea")).id = "source"),
                (t.className = "source-view"),
                (t.style.cssText =
                    "display:block;width:100%;height:revert-layer;font-family:Courier New,monospace;font-size:14px;border:1px solid #007bff;padding:10px;background-color:#e3f2fd;resize:vertical;"),
                (t.placeholder = "HTML source code will appear here..."),
                (t.value = this.formatHTML(this.editor.innerHTML)),
                this.editor.parentNode.insertBefore(t, this.editor.nextSibling),
                t.focus(),
                t.select(),
                (this.editor.style.display = "none"),
                this.showSuccessFeedback("Source view enabled"));
    }
    handleKeyboardShortcuts(t) {
        if (this.isEditorFocused && (t.ctrlKey || t.metaKey)){
            switch (t.key.toLowerCase()) {
                case "b":
                    t.preventDefault(), this.execCmd("bold");
                    break;
                case "i":
                    t.preventDefault(), this.execCmd("italic");
                    break;
                case "u":
                    t.preventDefault(), this.execCmd("underline");
                    break;
                case "z":
                    t.preventDefault(), this.execCmd("undo");
                    break;
                case "y":
                    t.preventDefault(), this.execCmd("redo");
                    break;
                case "s":
                    t.preventDefault(), this.execCustomCommand("toggleSource");
            }
        }
    }
    updateWordCount() {
        let t = this.editor.innerText || this.editor.textContent || "",
            l = t.trim() ? t.trim().split(/\s+/).length : 0,
            i = t.length,
            a = this.editor.parentNode.querySelector("#wordCount"),
            n = this.editor.parentNode.querySelector("#charCount");
        a && (a.textContent = l), n && (n.textContent = i);
    }
    updateButtonStates() {
        // 1. Array of standard commands to check
        const commands = [
            "bold", "italic", "underline", "strikeThrough", 
            "justifyLeft", "justifyCenter", "justifyRight"
        ];

        // 2. Loop through commands to update UI
        commands.forEach(command => {
            const isActive = document.queryCommandState(command);
            this.updateButtonState(command, isActive);
        });

        // 3. Update specialized states
        this.updateListButtonStates();
        this.updateIndentButtonStates();
    }
    updateButtonState(t, l) {
        let i = null;
        switch (t) {
            case "bold":
                i = this.toolbar.querySelector(".btn-bold");
                break;
            case "italic":
                i = this.toolbar.querySelector(".btn-italic");
                break;
            case "underline":
                i = this.toolbar.querySelector(".btn-underline");
                break;
            case "strikeThrough":
                i = this.toolbar.querySelector(".btn-strikethrough");
                break;
            case "justifyLeft":
                i = this.toolbar.querySelector(".btn-align-left");
                break;
            case "justifyCenter":
                i = this.toolbar.querySelector(".btn-align-center");
                break;
            case "justifyRight":
                i = this.toolbar.querySelector(".btn-align-right");
        }
        i && (l ? i.classList.add("active") : i.classList.remove("active"));
    }
    updateListButtonStates() {
        let t = window.getSelection();
        if (t.rangeCount > 0) {
            let l = t.getRangeAt(0),
                i = this.findClosestElement(l.commonAncestorContainer, "li"),
                a = i ? this.findClosestElement(i, "ul, ol") : null,
                isInsideEditor = a && this.editor && this.editor.contains(a);
            this.toolbar.querySelectorAll(".btn-list").forEach((t) => {
                isInsideEditor ? t.classList.add("active") : t.classList.remove("active");
            });
        }
    }    updateIndentButtonStates() {
        let t = window.getSelection();
        if (t.rangeCount > 0) {
            let l = t.getRangeAt(0),
                i = this.findClosestElement(
                    l.commonAncestorContainer,
                    "p, div, h1, h2, h3, h4, h5, h6"
                ),
                a = this.toolbar.querySelector(".btn-indent"),
                n = this.toolbar.querySelector(".btn-outdent");
            i && i.style.marginLeft && parseInt(i.style.marginLeft) > 0
                ? (a && a.classList.add("active"),
                    n && n.classList.remove("active"))
                : i && i.style.marginLeft && 0 === parseInt(i.style.marginLeft)
                    ? (a && a.classList.remove("active"),
                        n && n.classList.add("active"))
                    : (a && a.classList.remove("active"),
                        n && n.classList.remove("active"));
        }
    }
    showSuccessFeedback(t) {
        if (!1 === this.options.showToast) return;
        let l = document.getElementById("successToast");
        l &&
            ((l.innerHTML = `<i class="fa-regular fa-check"></i> ${ t }`),
                l.classList.add("show"),
                setTimeout(() => l.classList.remove("show"), 2500));
    }
    showImageMenu(t, l, i) {
        (this.selectedImage = t),
            (this.imageMenu.style.left = l + "px"),
            (this.imageMenu.style.top = i + "px"),
            (this.imageMenu.style.display = "block"),
            (this.imageMenu.querySelector('input[type="text"]').value =
                t.alt || "");
    }
    hideImageMenu() {
        (this.imageMenu.style.display = "none"), (this.selectedImage = null);
    }
    syncTextarea() {
        this.textarea.value = this.editor.innerHTML;
        let t = new Event("change", { bubbles: !0 });
        this.textarea.dispatchEvent(t);
    }
    getContent() {
        return this.editor.innerHTML;
    }
    setContent(t) {
        (this.editor.innerHTML = t),
            this.syncTextarea(),
            this.updateWordCount();
    }
    destroy() {
        (this.textarea.style.display = ""),
            (this.textarea.value = this.editor.innerHTML),
            this.editor.parentNode && this.editor.parentNode.remove();
        let t = document.getElementById("successToast");
        t && t.remove();
    }
    createMoreOptionsGroup() {
        let t = document.createElement("div");
        (t.className = "toolbar-group"),
            [
                { command: "cut", icon: "fa-scissors", title: "Cut (Ctrl+X)" },
                { command: "copy", icon: "fa-copy", title: "Copy (Ctrl+C)" },
                { command: "paste", icon: "fa-paste", title: "Paste (Ctrl+V)" },
                {
                    command: "subscript",
                    icon: "fa-subscript",
                    title: "Subscript",
                },
                {
                    command: "superscript",
                    icon: "fa-superscript",
                    title: "Superscript",
                },
                {
                    command: "insertDate",
                    icon: "fa-calendar-day",
                    title: "Insert Date",
                    custom: !0,
                },
                {
                    command: "insertTime",
                    icon: "fa-clock",
                    title: "Insert Time",
                    custom: !0,
                },
                {
                    command: "insertSpecialChar",
                    icon: "fa-asterisk",
                    title: "Insert Special Character",
                    custom: !0,
                },
                {
                    command: "insertCalendar",
                    icon: "fa-calendar",
                    title: "Insert Calendar",
                    custom: !0,
                },
                {
                    command: "insertEmoji",
                    icon: "fa-face-smile",
                    title: "Insert Emoji",
                    custom: !0,
                },
                {
                    command: "insertLayout",
                    icon: "fa-objects-column",
                    title: "Insert Layout",
                    custom: !0,
                },
            ].forEach((l) => {
                let i = l.custom
                    ? this.createCustomButton(l.command, l.icon, l.title)
                    : this.createButton(l.command, l.icon, l.title);
                t.appendChild(i);
            });
        let l = document.createElement("select");
        return (
            (l.className = "toolbar-select"),
            (l.title = "Outline Format"),
            [
                { value: "", text: "--Select Outline--" },
                { value: "option1", text: "[I, A, 1]" },
                { value: "option2", text: "[A, 1, a, 1, â€¢]" },
                { value: "option3", text: "[1, a, 1, â€¢]" },
                { value: "option4", text: "[A, I, a, i, â€¢]" },
                { value: "option5", text: "[1, a, 1, A, â€¢]" },
                {
                    value: "option6",
                    text: "[1, 1.1, 1.1.1, 1.1.1.1, 1.1.1.1.1]",
                },
                { value: "option7", text: "[â–¶, â†’, â—†, â€¢]" },
            ].forEach((t) => {
                let i = document.createElement("option");
                (i.value = t.value), (i.textContent = t.text), l.appendChild(i);
            }),
            l.addEventListener("change", () => {
                let t = l.value;
                if (!t) return;
                let i = window.getSelection();
                if (!i.rangeCount) return;
                let a = i.getRangeAt(0).cloneContents(),
                    n = [];
                if (
                    (a.querySelectorAll("li").forEach((t) => {
                        let l = t.innerText.trim();
                        l && n.push(l);
                    }),
                        0 === n.length)
                ) {
                    let s = "";
                    a.childNodes.forEach((t) => {
                        t.nodeType === Node.TEXT_NODE
                            ? (s += t.textContent)
                            : "BR" === t.nodeName ||
                                "DIV" === t.nodeName ||
                                "P" === t.nodeName
                                ? (s += "\n" + (t.innerText || t.textContent))
                                : (s += t.innerText || t.textContent);
                    }),
                        (n = s
                            .split(/\n/)
                            .map((t) => t.trim())
                            .filter((t) => "" !== t));
                }
                let o = {
                    option1: ["I", "A", "1"],
                    option2: ["A", "1", "a", "1", "disc"],
                    option3: ["1", "a", "1", "disc"],
                    option4: ["A", "I", "a", "i", "disc"],
                    option5: ["1", "a", "1", "A", "disc"],
                    option6: ["1", "1.1", "1.1.1", "1.1.1.1", "1.1.1.1.1"],
                    option7: ["disc", "circle", "square", "disc"],
                };
                if ("option1" === t) {
                    let r = window.getSelection();
                    if (!r.rangeCount) return;
                    let d = r.anchorNode;
                    d.nodeType === Node.TEXT_NODE && (d = d.parentElement);
                    let c = d ? d.closest("li") : null,
                        u = c ? c.innerText.trim() : "",
                        p = u ? [u] : [];
                    0 === p.length && (p = ["Item 1", "Item 2", "Item 3"]);
                    let h = '<ol type="I" class="option1-list">';
                    for (let m = 0; m < n.length; m++) h += `<li>${ n[m] }</li>`;
                    (h += "</ol>"), document.execCommand("insertHTML", !1, h);
                    return;
                }
                if ("option2" === t) {
                    let g = '<ol type="A">';
                    for (let x = 0; x < n.length; x++) g += `<li>${ n[x] }</li>`;
                    (g += "</ol>"), document.execCommand("insertHTML", !1, g);
                    return;
                }
                if ("option3" === t) {
                    let b = '<ol type="1">';
                    for (let y = 0; y < n.length; y++) b += `<li>${ n[y] }</li>`;
                    (b += "</ol>"), document.execCommand("insertHTML", !1, b);
                    return;
                }
                if ("option4" === t) {
                    let f = '<ol type="A">';
                    for (let C = 0; C < n.length; C++) f += `<li>${ n[C] }</li>`;
                    (f += "</ol>"), document.execCommand("insertHTML", !1, f);
                    return;
                }
                if ("option5" === t) {
                    let D = '<ol type="1">';
                    for (let $ = 0; $ < n.length; $++) D += `<li>${ n[$] }</li>`;
                    (D += "</ol>"), document.execCommand("insertHTML", !1, D);
                    return;
                }
                if ("option6" === t) {
                    let E = window.getSelection();
                    if (!E.rangeCount) return;
                    let v = E.anchorNode;
                    v.nodeType === Node.TEXT_NODE && (v = v.parentElement);
                    let _ =
                        '<ol class="decimal-list pointdesimal" style="counter-reset: item;">';
                    for (let T = 0; T < n.length; T++) _ += `<li>${ n[T] }</li>`;
                    (_ += "</ol>"), document.execCommand("insertHTML", !1, _);
                    return;
                }
                if ("option7" === t) {
                    let w = `<ul style="list-style-type: 'â–¶'">`;
                    for (let k = 0; k < n.length; k++) w += `<li>${ n[k] }</li>`;
                    (w += "</ul> "), document.execCommand("insertHTML", !1, w);
                    return;
                }
                let L = (function l(i, a = 0) {
                    if (!i.length) return null;
                    let n = o[t] || ["1", "a", "i", "disc"],
                        s = n[Math.min(a, n.length - 1)],
                        r = ["disc", "circle", "square"].includes(s),
                        d = r
                            ? document.createElement("ul")
                            : document.createElement("ol");
                    r ? (d.style.listStyleType = s) : (d.type = s);
                    let c = 0;
                    for (; c < i.length;) {
                        let u = i[c],
                            p = document.createElement("li");
                        if (
                            ((p.textContent = u),
                                d.appendChild(p),
                                c < i.length - 1 && a < n.length - 1)
                        ) {
                            let h = l([i[c + 1]], a + 1);
                            h && p.appendChild(h);
                        }
                        c++;
                    }
                    return d;
                })(n);
                L && document.execCommand("insertHTML", !1, L.outerHTML);
            }),
            t.appendChild(l),
            t
        );
    }
    createImageMenu() {
        let t = document.createElement("div");
        (t.className = "image-menu"),
            (t.style.position = "absolute"),
            (t.style.display = "none"),
            (t.style.background = "#fff"),
            (t.style.border = "1px solid #ccc"),
            (t.style.padding = "10px"),
            (t.style.zIndex = 1e4),
            (t.style.boxShadow = "0 2px 6px rgba(0,0,0,0.2)"),
            (t.style.borderRadius = "5px"),
            (t.style.minWidth = "250px"),
            (t.style.top = "50%"),
            (t.style.left = "40%");
        let l = document.createElement("div");
        l.style.marginBottom = "10px";
        let i = document.createElement("label");
        (i.textContent = "Alt Text: "),
            (i.style.display = "block"),
            (i.style.marginBottom = "5px"),
            (i.style.fontWeight = "bold");
        let a = document.createElement("input");
        (a.type = "text"),
            (a.style.width = "100%"),
            (a.style.padding = "5px"),
            (a.style.border = "1px solid #ddd"),
            (a.style.borderRadius = "3px"),
            l.appendChild(i),
            l.appendChild(a),
            t.appendChild(l);
        let n = document.createElement("button");
        (n.type = "button"),
            (n.textContent = "Save Alt Text"),
            (n.style.padding = "5px 10px"),
            (n.style.marginBottom = "10px"),
            (n.style.background = "#007bff"),
            (n.style.color = "white"),
            (n.style.border = "none"),
            (n.style.borderRadius = "3px"),
            (n.style.cursor = "pointer"),
            n.addEventListener("click", () => {
                this.selectedImage &&
                    "" !== a.value.trim() &&
                    ((this.selectedImage.alt = a.value.trim()),
                        this.syncTextarea(),
                        this.showSuccessFeedback("Alt text saved successfully!"));
            }),
            t.appendChild(n),
            t.appendChild(document.createElement("hr"));
        let s = document.createElement("button");
        (s.type = "button"),
            (s.textContent = "Replace Image"),
            (s.style.marginTop = "10px"),
            (s.style.padding = "5px 15px"),
            (s.style.background = "#fd7e14"),
            (s.style.color = "white"),
            (s.style.border = "none"),
            (s.style.borderRadius = "3px"),
            (s.style.cursor = "pointer"),
            s.addEventListener("click", () => {
                this.selectedImage &&
                    (this.openReplaceImage(this.selectedImage),
                        this.hideImageMenu());
            }),
            t.appendChild(s),
            t.appendChild(document.createElement("hr"));
        let o = document.createElement("button");
        (o.type = "button"),
            (o.textContent = "Crop Image"),
            (o.style.marginTop = "10px"),
            (o.style.padding = "5px 15px"),
            (o.style.background = "#28a745"),
            (o.style.color = "white"),
            (o.style.border = "none"),
            (o.style.borderRadius = "3px"),
            (o.style.cursor = "pointer"),
            o.addEventListener("click", () => {
                this.selectedImage &&
                    (this.openCropper(this.selectedImage),
                        this.hideImageMenu());
            }),
            t.appendChild(o),
            t.appendChild(document.createElement("hr"));
        let r = document.createElement("div");
        (r.textContent = "Image Alignment:"),
            (r.style.fontWeight = "bold"),
            (r.style.marginBottom = "8px"),
            t.appendChild(r);
        let d = document.createElement("div");
        (d.style.display = "grid"),
            (d.style.gridTemplateColumns = "repeat(2, 1fr)"),
            (d.style.gap = "5px"),
            [
                {
                    name: "Left aligned",
                    style: "float:left;margin:0 10px 10px 0;",
                },
                {
                    name: "Right aligned",
                    style: "float:right;margin:0 0 10px 10px;",
                },
                {
                    name: "Centered (break text)",
                    style: "display:block;margin:10px auto;float:none;",
                },
                {
                    name: "Break text: Left aligned",
                    style: "display:block;margin:10px 0 10px 0;float:none;text-align:left;",
                },
                {
                    name: "Break text: Centered",
                    style: "display:block;margin:10px auto;float:none;text-align:center;",
                },
                {
                    name: "Break text: Right aligned",
                    style: "display:block;margin:10px 0 10px auto;float:none;text-align:right;",
                },
            ].forEach((t) => {
                let l = document.createElement("button");
                (l.type = "button"),
                    (l.textContent = t.name),
                    (l.style.padding = "5px"),
                    (l.style.fontSize = "12px"),
                    (l.style.background = "#f8f9fa"),
                    (l.style.border = "1px solid #ddd"),
                    (l.style.borderRadius = "3px"),
                    (l.style.cursor = "pointer"),
                    l.addEventListener("click", () => {
                        this.selectedImage &&
                            ((this.selectedImage.style.cssText = t.style),
                                this.syncTextarea(),
                                this.hideImageMenu(),
                                this.showSuccessFeedback(
                                    `Image style applied: ${ t.name }`
                                ));
                    }),
                    d.appendChild(l);
            }),
            t.appendChild(d);
        let c = document.createElement("button");
        (c.type = "button"),
            (c.textContent = "Close"),
            (c.style.marginTop = "10px"),
            (c.style.padding = "5px 15px"),
            (c.style.background = "#6c757d"),
            (c.style.color = "white"),
            (c.style.border = "none"),
            (c.style.borderRadius = "3px"),
            (c.style.cursor = "pointer"),
            c.addEventListener("click", () => {
                this.hideImageMenu();
            });
        let u = document.createElement("div");
        return (
            (u.style.textAlign = "center"),
            (u.style.marginTop = "10px"),
            u.appendChild(c),
            t.appendChild(u),
            t
        );
    }
    openCropper(t) {
        let l = t.parentElement;
        l.classList.contains("cropper-wrapper") ||
            (((l = document.createElement("div")).className =
                "cropper-wrapper"),
                t.parentNode.insertBefore(l, t),
                l.appendChild(t));
        let i = new Cropper(t, {
            aspectRatio: NaN,
            viewMode: 1,
            autoCropArea: 1,
            background: !1,
        }),
            a = document.createElement("div");
        (a.className = "cropper-actions"),
            (a.innerHTML =
                '<button class="apply-btn">Apply Crop</button><button class="cancel-btn">Cancel</button>'),
            l.appendChild(a),
            a.querySelector(".apply-btn").addEventListener("click", () => {
                let l = i.getCroppedCanvas({ maxWidth: 1e3, maxHeight: 1e3 });
                (t.src = l.toDataURL("image/png")),
                    i.destroy(),
                    a.remove(),
                    this.makeImageResizable(t),
                    this.syncTextarea(),
                    this.showSuccessFeedback("Image cropped successfully!");
            }),
            a.querySelector(".cancel-btn").addEventListener("click", () => {
                i.destroy(), a.remove(), this.makeImageResizable(t);
            });
    }
    openReplaceImage(t) {
        let l = document.createElement("input");
        (l.type = "file"),
            (l.accept = "image/*"),
            l.addEventListener("change", (l) => {
                let i = l.target.files[0];
                if (!i) return;
                let a = new FileReader();
                (a.onload = (l) => {
                    (t.src = l.target.result),
                        this.syncTextarea(),
                        this.showSuccessFeedback(
                            "Image replaced successfully!"
                        );
                }),
                    a.readAsDataURL(i);
            }),
            l.click();
    }
    createMediaGroup() {
        let t = document.createElement("div");
        return (
            (t.className = "toolbar-group"),
            [
                {
                    command: "insertLink",
                    icon: "fa-link",
                    title: "Insert Link",
                    class: "btn-link",
                    custom: !0,
                },
                {
                    command: "unLink",
                    icon: "fa-unlink",
                    title: "Remove Link",
                    class: "btn-link",
                    custom: !0,
                },
                {
                    command: "insertImage",
                    icon: "fa-image",
                    title: "Insert External Image URL",
                    class: "btn-image",
                    custom: !0,
                },
                {
                    command: "insertVideo",
                    icon: "fa-video",
                    title: "Insert External Video URL",
                    class: "btn-video",
                    custom: !0,
                },
                {
                    command: "uploadImage",
                    icon: "fa-upload",
                    title: "Upload Image",
                    class: "btn-upload",
                    custom: !0,
                },
                {
                    command: "uploadVideo",
                    icon: "fa-upload",
                    title: "Upload Video",
                    class: "btn-upload",
                    custom: !0,
                },
            ].forEach((l) => {
                let i = this.createCustomButton(
                    l.command,
                    l.icon,
                    l.title,
                    l.class
                );
                t.appendChild(i);
            }),
            t
        );
    }
    createTable(t, l) {
        let i = '<table style="width:100%; border-collapse: collapse;">';
        i += "<thead><tr>";
        for (let a = 0; a < l; a++)
            i +=
                '<th style="border: 1px solid #ddd; padding: 8px; background:#f2f2f2;">Header</th>';
        i += "</tr></thead>";
        for (let n = 0; n < t; n++) {
            i += "<tr>";
            for (let s = 0; s < l; s++)
                i += `<td style="border: 1px solid #ddd; padding: 8px;">${ 0 === n ? "<strong>Header</strong>" : "Content"
                    }</td>`;
            i += "</tr>";
        }
        (i += "</table>"), document.execCommand("insertHTML", !1, i);
        let o = this.editor.querySelectorAll("table"),
            r = o[o.length - 1];
        this.makeTableEditable(r),
            this.showSuccessFeedback("Table inserted"),
            this.syncTextarea();
    }
    makeTableEditable(t) {
        (t.contentEditable = !1),
            t.querySelectorAll("td, th").forEach((l) => {
                (l.contentEditable = !0),
                    l.addEventListener("focus", () => {
                        (l.style.outline = "2px solid #007bff"),
                            (l.style.outlineOffset = "-1px"),
                            this.showTableContextMenu(t, l);
                    }),
                    l.addEventListener("blur", () => {
                        (l.style.outline = "none"), this.hideTableContextMenu();
                    });
            }),
            this.tables || (this.tables = []),
            this.tables.push(t);
    }
    showTableContextMenu(t, l) {
        this.hideTableContextMenu(),
            (this.tableContextMenu = document.createElement("div")),
            (this.tableContextMenu.className = "table-context-menu"),
            (this.tableContextMenu.style.cssText =
                "position: absolute;background: white;border: 1px solid #ddd;border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,0.1);z-index: 1000;padding: 5px 0;min-width: 150px;");
        let i = l.getBoundingClientRect();
        (this.tableContextMenu.style.top = `${ i.bottom + window.scrollY }px`),
            (this.tableContextMenu.style.left = `${ i.left + window.scrollX }px`),
            [
                {
                    text: "Insert Row Above",
                    action: () => this.insertTableRow(t, l, "above"),
                },
                {
                    text: "Insert Row Below",
                    action: () => this.insertTableRow(t, l, "below"),
                },
                {
                    text: "Insert Column Left",
                    action: () => this.insertTableColumn(t, l, "left"),
                },
                {
                    text: "Insert Column Right",
                    action: () => this.insertTableColumn(t, l, "right"),
                },
                { text: "Delete Row", action: () => this.deleteTableRow(t, l) },
                {
                    text: "Delete Column",
                    action: () => this.deleteTableColumn(t, l),
                },
                { text: "Merge Cells", action: () => this.mergeTableCells(t) },
                { text: "Make Heading", action: () => this.makeHeadingCell(t) },
                {
                    text: "Split Cells",
                    action: () => this.splitTableCells(t, l),
                },
                {
                    text: "Table Properties",
                    action: () => this.showTableProperties(t),
                },
            ].forEach((t) => {
                let l = document.createElement("div");
                (l.textContent = t.text),
                    (l.style.cssText =
                        "padding: 8px 12px;cursor: pointer;font-size: 14px;"),
                    l.addEventListener("mouseenter", () => {
                        l.style.background = "#f0f0f0";
                    }),
                    l.addEventListener("mouseleave", () => {
                        l.style.background = "white";
                    }),
                    l.addEventListener("click", (l) => {
                        l.stopPropagation(),
                            t.action(),
                            this.hideTableContextMenu();
                    }),
                    this.tableContextMenu.appendChild(l);
            }),
            document.body.appendChild(this.tableContextMenu),
            (this.tableContextMenuTimeout = setTimeout(() => {
                document.addEventListener(
                    "click",
                    this.hideTableContextMenu.bind(this)
                );
            }, 0));
    }
    hideTableContextMenu() {
        this.tableContextMenu &&
            (document.body.removeChild(this.tableContextMenu),
                (this.tableContextMenu = null)),
            document.removeEventListener("click", this.hideTableContextMenu),
            clearTimeout(this.tableContextMenuTimeout);
    }
    insertTableRow(t, l, i) {
        let a = l.parentElement;
        Array.from(a.parentElement.children).indexOf(a);
        let n = document.createElement("tr");
        for (let s = 0; s < a.cells.length; s++) {
            let o = document.createElement(a.cells[s].tagName);
            (o.innerHTML = "&nbsp;"),
                (o.contentEditable = !0),
                (o.style.border = "1px solid #ddd"),
                (o.style.padding = "8px"),
                n.appendChild(o);
        }
        "above" === i ? t.insertBefore(n, a) : t.insertBefore(n, a.nextSibling),
            this.syncTextarea(),
            this.showSuccessFeedback("Row inserted");
    }
    insertTableColumn(t, l, i) {
        let a = Array.from(l.parentElement.children).indexOf(l),
            n = t.rows;
        for (let s = 0; s < n.length; s++) {
            let o = document.createElement(0 === s ? "th" : "td");
            (o.innerHTML = 0 === s ? "<strong>Header</strong>" : "&nbsp;"),
                (o.contentEditable = !0),
                (o.style.border = "1px solid #ddd"),
                (o.style.padding = "8px"),
                "left" === i
                    ? n[s].insertBefore(o, n[s].cells[a])
                    : n[s].insertBefore(o, n[s].cells[a].nextSibling);
        }
        this.syncTextarea(), this.showSuccessFeedback("Column inserted");
    }
    deleteTableRow(t, l) {
        let i = l.parentElement;
        t.rows.length > 1
            ? (i.parentElement.removeChild(i),
                this.syncTextarea(),
                this.showSuccessFeedback("Row deleted"))
            : this.showSuccessFeedback("Cannot delete the only row");
    }
    deleteTableColumn(t, l) {
        let i = Array.from(l.parentElement.children).indexOf(l),
            a = t.rows;
        if (a[0].cells.length > 1) {
            for (let n = 0; n < a.length; n++)
                a[n].cells[i] && a[n].removeChild(a[n].cells[i]);
            this.syncTextarea(), this.showSuccessFeedback("Column deleted");
        } else this.showSuccessFeedback("Cannot delete the only column");
    }
    mergeTableCells(t) {
        let l = window.getSelection();
        if (!l.rangeCount) return;
        let i = l.getRangeAt(0),
            a = this.findClosestElement(i.startContainer, "td, th"),
            n = this.findClosestElement(i.endContainer, "td, th");
        if (!a || !n || a === n) {
            this.showSuccessFeedback("Select multiple cells to merge");
            return;
        }
        let s = this.getSelectedCells(a, n);
        if (s.length < 2) {
            this.showSuccessFeedback("Select multiple cells to merge");
            return;
        }
        let o = s[0];
        (o.rowSpan = s.length),
            (o.colSpan = 1),
            (o.innerHTML = s.map((t) => t.textContent).join(" "));
        for (let r = 1; r < s.length; r++) s[r].parentElement.removeChild(s[r]);
        this.syncTextarea(), this.showSuccessFeedback("Cells merged");
    }
    getSelectedCells(t, l) {
        let i = [],
            a = t.parentElement.rowIndex,
            n = Array.from(t.parentElement.cells).indexOf(t),
            s = l.parentElement.rowIndex,
            o = Array.from(l.parentElement.cells).indexOf(l),
            r = Math.min(a, s),
            d = Math.max(a, s),
            c = Math.min(n, o),
            u = Math.max(n, o),
            p = t.closest("table");
        for (let h = r; h <= d; h++)
            for (let m = c; m <= u; m++)
                p.rows[h] && p.rows[h].cells[m] && i.push(p.rows[h].cells[m]);
        return i;
    }
    splitTableCells(t, l) {
        if (l.rowSpan > 1 || l.colSpan > 1) {
            let i = l.parentElement,
                a = i.rowIndex,
                n = Array.from(i.cells).indexOf(l),
                s = l.rowSpan,
                o = l.colSpan;
            (l.rowSpan = 1), (l.colSpan = 1);
            for (let r = 0; r < s; r++)
                for (let d = 0; d < o; d++) {
                    if (0 === r && 0 === d) continue;
                    let c = t.rows[a + r];
                    if (!c) continue;
                    let u = document.createElement(l.tagName);
                    (u.innerHTML = "&nbsp;"),
                        (u.contentEditable = !0),
                        (u.style.border = "1px solid #ddd"),
                        (u.style.padding = "8px"),
                        0 === d
                            ? c.insertBefore(u, c.cells[n])
                            : c.insertBefore(u, c.cells[n + d]);
                }
            this.syncTextarea(), this.showSuccessFeedback("Cell split");
        } else this.showSuccessFeedback("Cell is not merged");
    }
    showTableProperties(t) {
        let l = document.createElement("div");
        (l.className = "table-properties-dialog"),
            (l.style.cssText =
                "position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);background: white;padding: 20px;border-radius: 8px;box-shadow: 0 4px 20px rgba(0,0,0,0.15);z-index: 10000;min-width: 300px;");
        let i = document.createElement("label");
        (i.textContent = "Border Width: "),
            (i.style.display = "block"),
            (i.style.marginBottom = "5px");
        let a = document.createElement("input");
        (a.type = "number"),
            (a.min = 0),
            (a.max = 10),
            (a.value = 1),
            (a.style.width = "100%"),
            (a.style.marginBottom = "15px");
        let n = document.createElement("label");
        (n.textContent = "Border Color: "),
            (n.style.display = "block"),
            (n.style.marginBottom = "5px");
        let s = document.createElement("input");
        (s.type = "color"),
            (s.value = "#dddddd"),
            (s.style.width = "100%"),
            (s.style.height = "40px"),
            (s.style.marginBottom = "15px");
        let o = document.createElement("label");
        (o.textContent = "Cell Padding: "),
            (o.style.display = "block"),
            (o.style.marginBottom = "5px");
        let r = document.createElement("input");
        (r.type = "number"),
            (r.min = 0),
            (r.max = 20),
            (r.value = 8),
            (r.style.width = "100%"),
            (r.style.marginBottom = "15px");
        let d = document.createElement("button");
        (d.textContent = "Apply"),
            (d.style.cssText =
                "padding: 8px 16px;background: #007bff;color: white;border: none;border-radius: 4px;cursor: pointer;margin-right: 10px;"),
            d.addEventListener("click", () => {
                (t.style.border = `${ a.value }px solid ${ s.value }`),
                    (t.style.borderCollapse = "collapse"),
                    t.querySelectorAll("td, th").forEach((t) => {
                        (t.style.border = `${ a.value }px solid ${ s.value }`),
                            (t.style.padding = `${ r.value }px`);
                    }),
                    this.syncTextarea(),
                    document.body.removeChild(l),
                    this.showSuccessFeedback("Table properties updated");
            });
        let c = document.createElement("button");
        (c.textContent = "Cancel"),
            (c.style.cssText =
                "padding: 8px 16px;background: #6c757d;color: white;border: none;border-radius: 4px;cursor: pointer;"),
            c.addEventListener("click", () => {
                document.body.removeChild(l);
            });
        let u = document.createElement("div");
        (u.style.marginTop = "15px"),
            (u.style.textAlign = "right"),
            u.appendChild(d),
            u.appendChild(c),
            l.appendChild(i),
            l.appendChild(a),
            l.appendChild(n),
            l.appendChild(s),
            l.appendChild(o),
            l.appendChild(r),
            l.appendChild(u),
            document.body.appendChild(l);
        let p = (t) => {
            l.contains(t.target) ||
                (document.body.removeChild(l),
                    document.removeEventListener("click", p));
        };
        setTimeout(() => {
            document.addEventListener("click", p);
        }, 0);
    }
    createTableGroup() {
        let t = document.createElement("div");
        (t.className = "toolbar-group"), (t.style.position = "relative");
        let l = document.createElement("button");
        (l.type = "button"),
            (l.className = "toolbar-btn btn-insert-table"),
            (l.innerHTML = '<i class="fa-regular fa-table"></i>&nbsp;Table');
        let i = document.createElement("div");
        return (
            (i.className = "table-submenu"),
            (i.style.display = "none"),
            (i.style.position = "absolute"),
            (i.style.top = "100%"),
            (i.style.left = "0"),
            (i.style.background = "#fff"),
            (i.style.border = "1px solid #ccc"),
            (i.style.zIndex = "1000"),
            (i.style.minWidth = "180px"),
            [
                {
                    command: "insertRowAbove",
                    icon: "fa-arrow-up",
                    title: "Insert Row Above",
                },
                {
                    command: "insertRowBelow",
                    icon: "fa-arrow-down",
                    title: "Insert Row Below",
                },
                {
                    command: "insertColLeft",
                    icon: "fa-arrow-left",
                    title: "Insert Column Left",
                },
                {
                    command: "insertColRight",
                    icon: "fa-arrow-right",
                    title: "Insert Column Right",
                },
                { command: "deleteRow", icon: "fa-trash", title: "Delete Row" },
                {
                    command: "deleteCol",
                    icon: "fa-minus-square",
                    title: "Delete Column",
                },
                {
                    command: "mergeCells",
                    icon: "fa-object-group",
                    title: "Merge Cells",
                },
                {
                    command: "makeHeading",
                    icon: "fa-heading",
                    title: "Make Heading",
                },
                {
                    command: "splitCell",
                    icon: "fa-columns",
                    title: "Split Cell",
                },
            ].forEach((t) => {
                let l = document.createElement("button");
                (l.type = "button"),
                    (l.className = "toolbar-btn " + t.command),
                    (l.innerHTML = `<i class="fa-regular ${ t.icon }"></i> ${ t.title }`),
                    (l.style.display = "block"),
                    (l.style.width = "100%"),
                    (l.style.textAlign = "left"),
                    (l.style.padding = "5px 10px"),
                    (l.style.border = "none"),
                    (l.style.background = "white"),
                    (l.style.cursor = "pointer"),
                    l.addEventListener("click", () => {
                        (i.style.display = "none"),
                            this.handleTableAction(t.command);
                    }),
                    i.appendChild(l);
            }),
            l.addEventListener("click", () => {
                this.handleTableAction("insertTable");
            }),
            l.addEventListener("mouseenter", () => {
                i.style.display = "block";
            }),
            t.addEventListener("mouseleave", () => {
                i.style.display = "none";
            }),
            t.appendChild(l),
            t.appendChild(i),
            t
        );
    }
    handleTableAction(t) {
        if ("insertTable" === t) {
            "function" == typeof this.insertTablePrompt
                ? this.insertTablePrompt()
                : this.insertTable(3, 3);
            return;
        }
        let l = window.getSelection().anchorNode;
        for (; l && "TD" !== l.nodeName && "TH" !== l.nodeName;)
            l = l.parentNode;
        if (!l && "mergeCells" !== t && "splitCell" !== t) return;
        let i = l ? l.parentNode : null,
            a = l ? l.closest("table") : null;
        switch (t) {
            case "insertRowAbove":
                let n = i.cloneNode(!0);
                [...n.cells].forEach((t) => (t.innerHTML = "&nbsp;")),
                    i.parentNode.insertBefore(n, i);
                break;
            case "insertRowBelow":
                let s = i.cloneNode(!0);
                [...s.cells].forEach((t) => (t.innerHTML = "&nbsp;")),
                    i.parentNode.insertBefore(s, i.nextSibling);
                break;
            case "insertColLeft":
                Array.from(a.rows).forEach((t) => {
                    let i = t.insertCell(l.cellIndex);
                    (i.innerHTML = "&nbsp;"), (i.className = "editor-td");
                });
                break;
            case "insertColRight":
                Array.from(a.rows).forEach((t) => {
                    let i = t.insertCell(l.cellIndex + 1);
                    (i.innerHTML = "&nbsp;"), (i.className = "editor-td");
                });
                break;
            case "deleteRow":
                i.parentNode.removeChild(i);
                break;
            case "deleteCol":
                Array.from(a.rows).forEach((t) => {
                    t.deleteCell(l.cellIndex);
                });
                break;
            case "mergeCells":
                "function" == typeof this.mergeSelectedCells &&
                    this.mergeSelectedCells();
                break;
            case "splitCell":
                let o = this.getSelectedCellsArray(),
                    r = null;
                if ((1 === o.length ? (r = o[0]) : l && (r = l), r)) {
                    if ("function" == typeof this.splitTableCells) {
                        let d = r.closest("table");
                        this.splitTableCells(d, r);
                    } else
                        "function" == typeof this.splitCell
                            ? this.splitCell(r)
                            : this.showSuccessFeedback(
                                "Split operation not available"
                            );
                } else
                    this.showSuccessFeedback("Select a merged cell to split");
                break;
            case "makeHeading":
                if (i && a) {
                    let c = a.querySelector("thead");
                    c ||
                        ((c = document.createElement("thead")),
                            a.insertBefore(c, a.firstChild));
                    let u = a.querySelector("tbody");
                    u ||
                        ((u = document.createElement("tbody")),
                            Array.from(a.querySelectorAll("tr")).forEach((t) => {
                                c.contains(t) || u.appendChild(t);
                            }),
                            a.appendChild(u)),
                        c.appendChild(i),
                        i.querySelectorAll("td").forEach((t) => {
                            let l = document.createElement("th");
                            (l.innerHTML = t.innerHTML),
                                (l.style.cssText = t.style.cssText),
                                (l.style.background = "#f2f2f2"),
                                (l.style.fontWeight = "bold"),
                                t.replaceWith(l);
                        }),
                        this.showSuccessFeedback("Heading row created"),
                        this.syncTextarea();
                }
        }
    }
    insertTablePrompt() {
        let t = parseInt(prompt("Enter number of rows:", "3"), 10) || 3,
            l = parseInt(prompt("Enter number of columns:", "3"), 10) || 3;
        this.insertTable(t, l);
    }
    insertTable(t, l) {
        let i = document.createElement("table");
        (i.className = "editor-table"),
            (i.style.borderCollapse = "collapse"),
            (i.style.width = "100%");
        for (let a = 0; a < t; a++) {
            let n = document.createElement("tr");
            for (let s = 0; s < l; s++) {
                let o = document.createElement("td");
                (o.innerHTML = "&nbsp;"),
                    (o.contentEditable = !0),
                    (o.tabIndex = 0),
                    (o.style.border = "1px solid #ddd"),
                    (o.style.padding = "8px"),
                    (o.style.minWidth = "40px"),
                    (o.style.minHeight = "24px"),
                    n.appendChild(o);
            }
            i.appendChild(n);
        }
        this.insertNodeAtCursor(i),
            "function" == typeof this.enableCellSelection &&
            this.enableCellSelection(),
            this.syncTextarea();
    }
    insertNodeAtCursor(t) {
        let l = window.getSelection();
        if (l.rangeCount > 0) {
            let i = l.getRangeAt(0);
            if (
                this.editor.contains(i.commonAncestorContainer) ||
                this.editor === i.commonAncestorContainer
            )
                i.deleteContents(), i.insertNode(t);
            else {
                this.editor.focus();
                let a = document.createRange();
                a.selectNodeContents(this.editor),
                    a.collapse(!1),
                    a.deleteContents(),
                    a.insertNode(t),
                    a.setStartAfter(t),
                    a.collapse(!0),
                    l.removeAllRanges(),
                    l.addRange(a);
            }
        } else {
            this.editor.focus();
            let n = document.createRange();
            n.selectNodeContents(this.editor),
                n.collapse(!1),
                n.insertNode(t),
                n.setStartAfter(t),
                n.collapse(!0);
            let s = window.getSelection();
            s.removeAllRanges(), s.addRange(n);
        }
    }
    splitCell(t) {
        if (1 === t.rowSpan && 1 === t.colSpan) {
            alert("Cell is not merged");
            return;
        }
        let l = t.rowSpan,
            i = t.colSpan,
            a = t.parentElement.rowIndex,
            n = t.cellIndex,
            s = t.closest("table");
        (t.rowSpan = 1), (t.colSpan = 1);
        for (let o = a; o < a + l; o++) {
            let r = s.rows[o];
            for (let d = n; d < n + i; d++) {
                if (o === a && d === n) continue;
                let c = r.insertCell(d);
                (c.innerHTML = "&nbsp;"),
                    (c.style.border = "1px solid #ddd"),
                    (c.style.padding = "8px"),
                    (c.contentEditable = !0);
            }
        }
    }
    mergeSelectedCells() {
        let t = this.getSelectedCellsArray();
        if (t.length < 2) {
            this.showSuccessFeedback("Select at least 2 cells to merge");
            return;
        }
        let l = t.map((t) => t.parentElement.rowIndex),
            i = t.map((t) => t.cellIndex),
            a = Math.min(...l),
            n = Math.max(...l),
            s = Math.min(...i),
            o = Math.max(...i);
        if (t.length !== (n - a + 1) * (o - s + 1)) {
            alert("Selection must form a contiguous rectangle to merge.");
            return;
        }
        let r = t.find(
            (t) => t.parentElement.rowIndex === a && t.cellIndex === s
        );
        r || (r = t[0]),
            (r.rowSpan = n - a + 1),
            (r.colSpan = o - s + 1),
            (r.innerHTML = t.map((t) => t.innerHTML.trim()).join(" ")),
            t.forEach((t) => {
                t !== r && t.remove();
            }),
            this.clearSelectedCells(),
            this.showSuccessFeedback("Cells merged"),
            this.syncTextarea(),
            r.focus();
        let d = document.createRange();
        d.selectNodeContents(r), d.collapse(!1);
        let c = window.getSelection();
        c.removeAllRanges(), c.addRange(d);
    }
    clearSelectedCells() {
        this._selectedCells || (this._selectedCells = new Set()),
            this._selectedCells.forEach((t) =>
                t.classList.remove("selected-cell")
            ),
            this._selectedCells.clear();
    }
    addSelectedCell(t) {
        this._selectedCells || (this._selectedCells = new Set()),
            t.classList.contains("selected-cell") ||
            (t.classList.add("selected-cell"), this._selectedCells.add(t));
    }
    getSelectedCellsArray() {
        return this._selectedCells ? Array.from(this._selectedCells) : [];
    }
    enableCellSelection() {
        let t = !1,
            l = !1,
            i = 0,
            a = 0,
            n = null;
        this.editor.addEventListener("pointerdown", (s) => {
            s.target &&
                "TD" === s.target.tagName &&
                ((t = !0),
                    (l = !1),
                    (i = s.clientX),
                    (a = s.clientY),
                    (n = s.target));
        }),
            this.editor.addEventListener("pointermove", (s) => {
                if (!t) return;
                let o = Math.abs(s.clientX - i),
                    r = Math.abs(s.clientY - a);
                if (
                    (!l &&
                        (o > 6 || r > 6) &&
                        ((l = !0),
                            s.ctrlKey || s.metaKey || this.clearSelectedCells(),
                            n && this.addSelectedCell(n)),
                        l)
                ) {
                    let d = document.elementFromPoint(s.clientX, s.clientY);
                    d && "TD" === d.tagName && this.addSelectedCell(d),
                        s.preventDefault();
                }
            }),
            document.addEventListener("pointerup", (i) => {
                if (t) {
                    if (!l && n && "TD" === n.tagName) {
                        this.clearSelectedCells(),
                            this.addSelectedCell(n),
                            n.focus();
                        let a = document.createRange();
                        a.selectNodeContents(n), a.collapse(!1);
                        let s = window.getSelection();
                        s.removeAllRanges(), s.addRange(a);
                    }
                    (t = !1), (l = !1), (n = null), this.syncTextarea();
                }
            });
    }
    getSelectedCellsArray() {
        return this._selectedCells ? Array.from(this._selectedCells) : [];
    }
    showEmojiPopup() {
        let t = document.getElementById("emojiPopup");
        t && t.remove();
        let l = null;
        this.toolbar &&
            (l = this.toolbar.querySelector(
                '.toolbar-btn[title="Insert Emoji"]'
            )),
            l ||
            (l =
                document.querySelector(
                    '.toolbar-btn[title="Insert Emoji"]'
                ) ||
                document
                    .querySelector(".fa-face-smile")
                    ?.closest("button"));
        let i = document.createElement("div");
        (i.id = "emojiPopup"),
            (i.style.cssText =
                "position: absolute;visibility: hidden;background: white;border: 1px solid #ccc;border-radius: 8px;box-shadow: 0 4px 15px rgba(0,0,0,0.2);width: 320px;max-height: 420px;display: flex;z-index: 9999;overflow: hidden;");
        let a = document.createElement("input");
        (a.type = "text"),
            (a.placeholder = "Find an emoji (e.g. happy)"),
            (a.style.cssText =
                "padding: 7px;margin: 10px;border: 1px solid #ddd;border-radius: 6px;outline: none;"),
            i.appendChild(a),
            (document.createElement("div").style.cssText =
                "display:flex; gap:8px; align-items:center; padding:0 10px 8px;");
        let n = document.createElement("select"),
            s = document.createElement("div");
        (s.style.cssText =
            "display:flex; gap:4px; padding:6px 8px; border-top:1px solid #f3f3f3; border-bottom:1px solid #eee; overflow-x:auto;"),
            i.appendChild(s);
        let o = document.createElement("div");
        (o.style.cssText =
            "display: grid;grid-template-columns: repeat(auto-fill, 36px);gap: 6px;padding: 10px;overflow-y: auto;flex: 1;background: #fff;"),
            i.appendChild(o);
        let r = document.createElement("div");
        r.style.cssText =
            "padding:8px; text-align:right; border-top:1px solid #f3f3f3;";
        let d = document.createElement("button");
        (d.textContent = "Close"),
            (d.style.cssText =
                "padding:6px 12px; background:#6c757d; color:white; border:none; border-radius:6px; cursor:pointer;"),
            r.appendChild(d),
            i.appendChild(r);
        let c = {
            "\uD83D\uDE00": [
                "\uD83D\uDE00",
                "\uD83D\uDE01",
                "\uD83D\uDE02",
                "\uD83E\uDD23",
                "\uD83D\uDE0A",
                "\uD83D\uDE07",
                "\uD83D\uDE42",
                "\uD83D\uDE43",
                "\uD83D\uDE09",
                "\uD83D\uDE0D",
                "\uD83D\uDE18",
                "\uD83D\uDE0B",
                "\uD83D\uDE1C",
                "\uD83E\uDD2A",
                "\uD83D\uDE0E",
                "\uD83E\uDD29",
                "\uD83E\uDD73",
                "\uD83E\uDD17",
                "\uD83E\uDD14",
                "\uD83E\uDD28",
            ],
            "\uD83D\uDC31": [
                "\uD83D\uDC36",
                "\uD83D\uDC31",
                "\uD83D\uDC2D",
                "\uD83D\uDC39",
                "\uD83D\uDC30",
                "\uD83E\uDD8A",
                "\uD83D\uDC3B",
                "\uD83D\uDC3C",
                "\uD83D\uDC28",
                "\uD83D\uDC2F",
                "\uD83E\uDD81",
                "\uD83D\uDC2E",
                "\uD83D\uDC37",
                "\uD83D\uDC38",
                "\uD83D\uDC35",
            ],
            "âš½": [
                "âš½",
                "\uD83C\uDFC0",
                "\uD83C\uDFC8",
                "âš¾",
                "\uD83C\uDFBE",
                "\uD83C\uDFD0",
                "\uD83C\uDFC9",
                "\uD83C\uDFB1",
                "\uD83C\uDFD3",
                "\uD83C\uDFF8",
            ],
            "\uD83C\uDF55": [
                "\uD83C\uDF4F",
                "\uD83C\uDF4E",
                "\uD83C\uDF4A",
                "\uD83C\uDF4C",
                "\uD83C\uDF49",
                "\uD83C\uDF47",
                "\uD83C\uDF53",
                "\uD83C\uDF52",
                "\uD83C\uDF51",
                "\uD83C\uDF4D",
                "\uD83E\uDD6D",
                "\uD83C\uDF55",
                "\uD83C\uDF54",
                "\uD83C\uDF5F",
                "\uD83C\uDF69",
            ],
            "\uD83D\uDE97": [
                "\uD83D\uDE97",
                "\uD83D\uDE95",
                "\uD83D\uDE99",
                "\uD83D\uDE8C",
                "\uD83D\uDE8E",
                "\uD83C\uDFCEï¸",
                "\uD83D\uDE93",
                "\uD83D\uDE91",
                "\uD83D\uDE92",
                "\uD83D\uDE90",
                "\uD83D\uDE9A",
                "\uD83D\uDE9B",
                "\uD83D\uDE9C",
            ],
            "\uD83C\uDF0D": [
                "\uD83C\uDF0D",
                "\uD83C\uDF0E",
                "\uD83C\uDF0F",
                "\uD83D\uDDFAï¸",
                "\uD83C\uDFD4ï¸",
                "â›°ï¸",
                "\uD83C\uDF0B",
                "\uD83C\uDFD6ï¸",
                "\uD83C\uDFDDï¸",
            ],
        },
            u = {
                "\uD83D\uDE00": ["grinning", "happy", "smile", "face"],
                "\uD83D\uDE01": ["grin", "happy", "smile"],
                "\uD83D\uDE02": ["laugh", "tear", "funny"],
                "\uD83D\uDE0A": ["smile", "blush", "happy"],
                "\uD83D\uDE0D": ["love", "heart", "crush"],
                "\uD83D\uDE22": ["sad", "cry"],
                "\uD83D\uDE2D": ["cry", "tears", "sad"],
                "\uD83D\uDE21": ["angry", "mad", "furious"],
                "\uD83D\uDE0E": ["cool", "sunglasses"],
                "\uD83D\uDC4D": ["like", "thumb", "approve", "good"],
                "\uD83D\uDC4E": ["dislike", "thumb"],
                "\uD83D\uDC4F": ["clap", "applause"],
                "\uD83D\uDC4B": ["wave", "hello", "bye"],
                "\uD83D\uDE4C": ["raise", "praise", "hooray"],
                "\uD83E\uDD1D": ["handshake", "agreement"],
                "\uD83D\uDE4F": ["pray", "thanks", "please"],
                "\uD83C\uDF4F": ["apple", "fruit", "green apple"],
                "\uD83C\uDF4E": ["apple", "fruit", "red apple"],
                "\uD83C\uDF4A": ["orange", "fruit", "citrus"],
                "\uD83C\uDF4C": ["banana", "fruit"],
                "\uD83C\uDF49": ["watermelon", "fruit"],
                "\uD83C\uDF47": ["grapes", "fruit"],
                "\uD83C\uDF53": ["strawberry", "fruit"],
                "\uD83C\uDF52": ["cherry", "fruit"],
                "\uD83C\uDF51": ["peach", "fruit"],
                "\uD83C\uDF4D": ["pineapple", "fruit"],
                "\uD83E\uDD6D": ["mango", "fruit"],
                "\uD83C\uDF54": ["burger", "fast food"],
                "\uD83C\uDF55": ["pizza", "food", "slice"],
                "\uD83C\uDF5F": ["fries", "food"],
                "\uD83C\uDF69": ["donut", "dessert"],
                "\uD83D\uDE97": ["car", "vehicle", "automobile"],
                "\uD83D\uDE95": ["taxi", "car", "cab"],
                "\uD83D\uDE99": ["suv", "car", "jeep"],
                "\uD83D\uDE8C": ["bus", "vehicle"],
                "\uD83D\uDE8E": ["trolley", "bus"],
                "\uD83C\uDFCEï¸": ["racecar", "car", "fast"],
                "\uD83D\uDE93": ["police car", "car"],
                "\uD83D\uDE91": ["ambulance", "car"],
                "\uD83D\uDE92": ["firetruck", "fire engine"],
                "\uD83D\uDE9A": ["truck", "lorry"],
                "\uD83D\uDE9B": ["truck", "lorry", "cargo"],
                "\uD83D\uDE9C": ["tractor", "farm"],
                "\uD83C\uDF0D": ["earth", "globe", "world", "europe", "africa"],
                "\uD83C\uDF0E": ["earth", "globe", "world", "america"],
                "\uD83C\uDF0F": [
                    "earth",
                    "globe",
                    "world",
                    "asia",
                    "australia",
                ],
                "\uD83D\uDDFAï¸": ["map", "earth", "world"],
                "\uD83C\uDFD4ï¸": ["mountain", "earth"],
                "\uD83C\uDF0B": ["volcano", "lava", "earth"],
                "\uD83C\uDFDDï¸": ["island", "beach", "earth"],
                "\uD83D\uDC36": ["dog", "puppy", "pet"],
                "\uD83D\uDC31": ["cat", "kitty", "pet"],
                "\uD83D\uDC2D": ["mouse", "rat"],
                "\uD83D\uDC39": ["hamster", "pet"],
                "\uD83D\uDC30": ["rabbit", "bunny"],
                "\uD83E\uDD8A": ["fox"],
                "\uD83D\uDC3B": ["bear"],
                "\uD83D\uDC3C": ["panda"],
                "\uD83D\uDC28": ["koala"],
                "\uD83D\uDC2F": ["tiger"],
                "\uD83E\uDD81": ["lion"],
                "\uD83D\uDC2E": ["cow"],
                "\uD83D\uDC37": ["pig"],
                "\uD83D\uDC38": ["frog"],
                "\uD83D\uDC35": ["monkey"],
            },
            p = new Set([
                "\uD83D\uDC4D",
                "\uD83D\uDC4E",
                "\uD83D\uDC4B",
                "\uD83D\uDC4F",
                "\uD83D\uDE4C",
                "\uD83E\uDD1D",
                "\uD83E\uDD1E",
                "âœŒï¸",
                "\uD83E\uDD1F",
                "\uD83E\uDD18",
                "\uD83D\uDC4C",
                "\uD83E\uDD0F",
                "âœŠ",
                "\uD83D\uDC4A",
                "âœ‹",
                "\uD83D\uDD90",
                "\uD83D\uDD96",
                "\uD83E\uDD1A",
                "\uD83D\uDC48",
                "\uD83D\uDC49",
                "\uD83D\uDC46",
                "\uD83D\uDC47",
                "â˜ï¸",
                "âœï¸",
                "\uD83D\uDC68",
                "\uD83D\uDC69",
                "\uD83E\uDDD1",
            ]),
            h = "";
        function m(t) {
            if (((o.innerHTML = ""), !t || 0 === t.length)) {
                let l = document.createElement("div");
                (l.textContent = "No emojis found"),
                    (l.style.cssText =
                        "padding:16px; color:#666; text-align:center; grid-column: 1 / -1;"),
                    o.appendChild(l);
                return;
            }
            t.forEach((t) => {
                var l;
                let i = ((l = t), h && p.has(l) ? l + h : l),
                    a = document.createElement("button");
                (a.type = "button"),
                    (a.textContent = i),
                    (a.title = t),
                    (a.style.cssText =
                        "font-size:20px;width:36px;height:36px;line-height:1;border-radius:6px;border:none;background:transparent;cursor:pointer;"),
                    a.addEventListener("click", (t) => {
                        t.stopPropagation(),
                            document.execCommand("insertText", !1, i),
                            this.showSuccessFeedback("Emoji inserted"),
                            this.syncTextarea(),
                            b();
                    }),
                    o.appendChild(a);
            });
        }
        let g = Object.keys(c)[0];
        function x(t) {
            let l = t.toLowerCase();
            if (!l || l.length < 2) {
                m(c[g]);
                return;
            }
            let i = new Set();
            Object.keys(u).forEach((t) => {
                let a = u[t];
                for (let n of a)
                    if (n.includes(l)) {
                        i.add(t);
                        break;
                    }
            }),
                Object.values(c)
                    .flat()
                    .forEach((t) => {
                        t.includes(l) && i.add(t);
                    }),
                m(Array.from(i));
        }
        function b() {
            document.removeEventListener("click", y), i.remove();
        }
        function y(t) {
            i.contains(t.target) || (l && l.contains(t.target)) || b();
        }
        Object.keys(c).forEach((t) => {
            let l = document.createElement("button");
            (l.type = "button"),
                (l.textContent = t),
                (l.style.cssText = `padding:6px 8px; border:none; background:${ t === g ? "#f0f0f0" : "transparent"
                    }; cursor:pointer; border-radius:6px;`),
                l.addEventListener("click", () => {
                    (g = t),
                        m(c[t]),
                        [...s.children].forEach(
                            (t) => (t.style.background = "transparent")
                        ),
                        (l.style.background = "#f0f0f0"),
                        (a.value = "");
                }),
                s.appendChild(l);
        }),
            m(c[g]),
            n.addEventListener("change", () => {
                (h = n.value || ""),
                    a.value && a.value.trim().length >= 2
                        ? x(a.value.trim().toLowerCase())
                        : m(c[g]);
            }),
            a.addEventListener("input", (t) => {
                let l = t.target.value.trim();
                l.length >= 2 ? x(l) : m(c[g]);
            }),
            d.addEventListener("click", b),
            setTimeout(() => document.addEventListener("click", y), 0),
            document.body.appendChild(i);
        let f = i.getBoundingClientRect(),
            C = window.scrollY + 10,
            D = window.scrollX + window.innerWidth - f.width - 10;
        if (l) {
            let $ = l.getBoundingClientRect();
            (C = $.bottom + window.scrollY + 6),
                (D = $.left + window.scrollX) + f.width >
                window.scrollX + window.innerWidth - 8 &&
                (D = window.scrollX + window.innerWidth - f.width - 8),
                C + f.height > window.scrollY + window.innerHeight - 8 &&
                (C = $.top + window.scrollY - f.height - 6);
        }
        (i.style.left = `${ Math.max(D, window.scrollX + 8) }px`),
            (i.style.top = `${ Math.max(C, window.scrollY + 8) }px`),
            (i.style.visibility = "visible");
    }
    showLayoutPopup() {
        let t = document.getElementById("layoutPopup");
        t && t.remove();
        let l =
            this.toolbar?.querySelector(
                '.toolbar-btn[title="Insert Layout"]'
            ) ||
            document
                .querySelector(".fa-table-cells-large")
                ?.closest("button"),
            i = document.createElement("div");
        (i.id = "layoutPopup"),
            (i.style.cssText =
                "position:absolute;visibility:hidden;background:white;border:1px solid #ccc;border-radius:8px;box-shadow:0 4px 15px rgba(0,0,0,0.2);padding:12px;display:grid;grid-template-columns: repeat(3, 80px);gap:12px;z-index:9999;");
        let a = [
            {
                name: "One Column",
                html: `<div style="display:flex; margin:10px 0;">

                        <div style="flex:0 0 100%; max-width:100%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Your content</div>

                    </div>`,
            },
            {
                name: "Two Columns",
                html: `<div style="display:flex; margin:10px 0;">

                        <div style="flex:0 0 50%; max-width:50%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Column 1</div>

                        <div style="flex:0 0 50%; max-width:50%; border:1px dashed #aaa; padding:10px;box-sizing:border-box;">Column 2</div>

                    </div>`,
            },
            {
                name: "Three Columns",
                html: `<div style="display:flex; margin:10px 0;">

                        <div style="flex:0 0 33.33%; max-width:33.33%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 1</div>

                        <div style="flex:0 0 33.33%; max-width:33.33%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 2</div>

                        <div style="flex:0 0 33.33%; max-width:33.33%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 3</div>

                    </div>`,
            },
            {
                name: "Two Thirds + One Third",
                html: `<div style="display:flex; margin:10px 0;">

                        <div style="flex:0 0 66.66%; max-width:66.66%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 1</div>

                        <div style="flex:0 0 33.33%; max-width:33.33%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 2</div>

                    </div>`,
            },
            {
                name: "One Third + Two Thirds",
                html: `<div style="display:flex; margin:10px 0;">

                        <div style="flex:0 0 33.33%; max-width:33.33%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 1</div>

                        <div style="flex:0 0 66.66%; max-width:66.66%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">Col 2</div>

                    </div>`,
            },
            {
                name: "Four Columns",
                html: `<div style="display:flex; margin:10px 0;">

                        <div style="flex:0 0 25%; max-width:25%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">1</div>

                        <div style="flex:0 0 25%; max-width:25%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">2</div>

                        <div style="flex:0 0 25%; max-width:25%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">3</div>

                        <div style="flex:0 0 25%; max-width:25%; border:1px dashed #aaa; padding:10px; box-sizing:border-box;">4</div>

                    </div>`,
            },
        ];
        function n() {
            document.removeEventListener("click", s), i.remove();
        }
        function s(t) {
            i.contains(t.target) || (l && l.contains(t.target)) || n();
        }
        a.forEach((t) => {
            let l = document.createElement("button");
            (l.type = "button"),
                (l.style.cssText =
                    "border:1px solid #ddd;padding:6px;background:#f9f9f9;cursor:pointer;border-radius:6px;"),
                (l.title = t.name);
            let a = document.createElement("div");
            a.style.cssText = "display:flex; gap:2px; height:36px; width:65px;";
            let s = document.createElement("div");
            s.innerHTML = t.html;
            let o = s.querySelectorAll("div[style*='border']");
            o.forEach((t) => {
                let l = t.getAttribute("style").match(/(\d+(\.\d+)?)%/),
                    i = l ? parseFloat(l[1]) : 100 / o.length,
                    n = document.createElement("div");
                (n.style.cssText = `flex-grow:${ i };background:#ddd;height:100%;`),
                    a.appendChild(n);
            }),
                l.appendChild(a),
                l.addEventListener("click", (l) => {
                    l.stopPropagation(),
                        document.execCommand(
                            "insertHTML",
                            !1,
                            "<br>" + t.html + "<br>"
                        ),
                        this.showSuccessFeedback("Layout inserted"),
                        this.syncTextarea(),
                        n();
                }),
                i.appendChild(l);
        }),
            setTimeout(() => document.addEventListener("click", s), 0),
            document.body.appendChild(i);
        let o = l?.getBoundingClientRect(),
            r = o ? o.bottom + window.scrollY + 6 : 50,
            d = o ? o.left + window.scrollX : 50;
        (i.style.left = `${ d }px`),
            (i.style.top = `${ r }px`),
            (i.style.visibility = "visible");
    }
    formatHTML(t) {
        let l = "",
            i = 0;
        return (
            (t = t.replace(/>\s+</g, "><"))
                .split(/(<[^>]+>)/g)
                .filter((t) => "" !== t.trim())
                .forEach((t) => {
                    t.match(/^<\/\w/)
                        ? ((i = Math.max(0, i - 1)),
                            (l += "  ".repeat(i) + t + "\n"))
                        : t.match(/^<\w[^>]*[^\/]>$/)
                            ? ((l += "  ".repeat(i) + t + "\n"), i++)
                            : t.match(/^<\w[^>]*\/>$/)
                                ? (l += "  ".repeat(i) + t + "\n")
                                : t.trim() && (l += "  ".repeat(i) + t.trim() + "\n");
                }),
            l.trim()
        );
    }
}
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("textarea.rich-text-editor").forEach((t) => {
        let l = t.getAttribute("data-gallery-api-url");
        new RichTextEditor(t, {
            showToast: !1,
            ...(l ? { galleryApiUrl: l } : {}),
        });
    });
});
const observer = new MutationObserver(function (t) {
    t.forEach(function (t) {
        t.addedNodes.forEach(function (t) {
            if (1 === t.nodeType) {
                if (
                    "TEXTAREA" === t.tagName &&
                    t.classList.contains("rich-text-editor")
                ) {
                    let l = t.getAttribute("data-gallery-api-url");
                    new RichTextEditor(t, {
                        showToast: !1,
                        ...(l ? { galleryApiUrl: l } : {}),
                    });
                }
                (t.querySelectorAll
                    ? t.querySelectorAll("textarea.rich-text-editor")
                    : []
                ).forEach((t) => {
                    let l = t.getAttribute("data-gallery-api-url");
                    new RichTextEditor(t, {
                        showToast: !1,
                        ...(l ? { galleryApiUrl: l } : {}),
                    });
                });
            }
        });
    });
});
observer.observe(document.body, { childList: !0, subtree: !0 }),
    (window.RichTextEditor = RichTextEditor);
