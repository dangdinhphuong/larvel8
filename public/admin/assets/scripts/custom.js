function selectFileWithCKFinder(elementId, previewId = null) {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                let file = evt.data.files.first();
                let output = document.getElementById(elementId);
                let src = window.location.origin + file.getUrl();
                output.value = src;
                if (previewId !== null){
                    $('#' + previewId).attr('src', src)
                }
            });

            finder.on('file:choose:resizedImage', function (evt) {
                let output = document.getElementById(elementId);
                output.value = window.location.origin + evt.data.resizedUrl;

                let src = window.location.origin + evt.data.resizedUrl;
                output.value = src;
                if (previewId !== null){
                    $('#' + previewId).attr('src', src)
                }
            });

        }
    });
}
