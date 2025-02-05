// Handle the banner file upload
document.getElementById('banner').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = document.getElementById('preview-banner');
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Handle the poster file upload
document.getElementById('poster').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = document.getElementById('preview-poster');
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
