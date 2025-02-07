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

function validateForm() {
    var banner = document.getElementById("banner").files.length; //checks if file has been uploaded
    var poster = document.getElementById("poster").files.length; //checks if file has been uploaded
    var name = document.getElementById("name").value.trim(); 
    var desc = document.getElementById("desc").value.trim();
    var genres = document.querySelectorAll('input[name="genre[]"]:checked');

    if (banner === 0) {
        alert("Please upload a movie banner.");
        return false;
    }
    if (poster === 0) {
        alert("Please upload a movie poster.");
        return false;
    }
    if (name === "") {
        alert("Movie name is required.");
        return false;
    }
    if (desc === "") {
        alert("Movie description is required.");
        return false;
    }
    if (genres.length === 0) {
        alert("Please select at least one genre.");
        return false;
    }
    
    return true; // Form will submit if all validations pass
}