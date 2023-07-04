<!DOCTYPE html>
<html>
<head>
    <title>Video Upload</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Video Upload</h2>
        <form enctype="multipart/form-data">
            <div class="form-group">
                <label for="video">Select Video File:</label>
                <input type="file" class="form-control-file" id="video" accept="video/*">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        <div id="video-preview"></div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        // Preview the selected video file
        document.getElementById('video').addEventListener('change', function(e) {
            var videoPreview = document.getElementById('video-preview');
            videoPreview.innerHTML = '';

            var file = e.target.files[0];
            var video = document.createElement('video');
            video.setAttribute('controls', '');
            video.setAttribute('width', '640');
            video.setAttribute('height', '480');

            var source = document.createElement('source');
            source.setAttribute('src', URL.createObjectURL(file));
            source.setAttribute('type', file.type);

            video.appendChild(source);
            videoPreview.appendChild(video);
        });
    </script>
</body>
</html>
