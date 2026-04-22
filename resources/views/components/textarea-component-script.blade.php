<script>
    document.addEventListener('DOMContentLoaded', function() {
        const target = document.getElementById('{{$id}}');
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

                console.log('✅ Pasted HTML (body content only):', bodyContent);
            } else if (clipboardText) {
                console.log('📝 Pasted plain text detected');
                target.textContent += clipboardText;
            } else {
                console.warn('⚠️ No clipboard data found.');
            }
        });
    });
</script>
