// Handle the banner file upload
document.getElementById('banner').addEventListener('change', function (event) { //runs the event when file is uploaded(change)
    var file = event.target.files[0]; //contains list of files uploaded by user [0] is for the first file
    if (file) {
        var reader = new FileReader(); //FileReader() is built in js 
        reader.onload = function () {  //When the file has been loaded it will run function 
            var preview = document.getElementById('preview-banner');
            preview.src = reader.result; //Got from stackoverflow https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
        };
        reader.readAsDataURL(file);
    }
});
// Handle the poster file upload
document.getElementById('poster').addEventListener('change', function (event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function () {
            var preview = document.getElementById('preview-poster');
            preview.src = reader.result;
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