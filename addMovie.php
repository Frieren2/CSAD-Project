<div>
<form class="form" method="post" action="movies.php" enctype="multipart/form-data" onsubmit="return validateForm()">
<h1>Add Movie:</h1>
    <div>
        <label for="banner" class="banner-style" id="banner-style">
            <img src="resources/cloud-upload.png" width="50" id="preview-banner" alt="Upload Preview">
            <p>Upload Movie Banner</p>
        </label>
        <input type="file" id="banner" name="banner" accept="image/png, image/jpg">
    </div>
    <div style="margin-top:20px">
        <label for="poster" class="poster-style" id="poster-style">
            <img src="resources/cloud-upload.png" width="50" id="preview-poster" alt="Upload Preview">
            <p>Upload Movie Poster</p>
        </label>
        <input type="file" id="poster" accept="image/png, image/jpg" name="poster">
    </div>
    <div style="margin-top:20px; display: flex; align-items: center;">
        <label style="width: 150px;">Movie Name:</label>
        <input type="text" class="name" name="name" id="name" required>
    </div>
    <div style="margin-top:20px; display: flex; align-items: center;">
        <label style="width: 150px;">Movie Description:</label>
        <textarea class="desc" name="desc" id="desc" required></textarea>
    </div>
    <div style="margin-top:20px">Movie Rating:
        <input type="radio" name="movieRating" id="PG" value="PG" checked>
        <label for="PG" class="rating">PG</label>
        <input type="radio" name="movieRating" id="PG13" value="PG13">
        <label for="PG13" class="rating">PG13</label>
        <input type="radio" name="movieRating" id="NC16" value="NC16">
        <label for="NC16" class="rating">NC16</label>
        <input type="radio" name="movieRating" id="M18" value="M18">
        <label for="M18" class="rating">M18</label>
        <input type="radio" name="movieRating" id="R21" value="R21">
        <label for="R21" class="rating">R21</label>
    </div>
    <div style="margin-top:20px; display: flex; align-items: center;">Genre:
        <input type="checkbox" name="genre[]" id="horror" value="horror">
        <label for="horror">Horror</label>
        <input type="checkbox" name="genre[]" id="action" value="action">
        <label for="action">Action</label>
        <input type="checkbox" name="genre[]" id="drama" value="drama">
        <label for="drama">Drama</label>
        <input type="checkbox" name="genre[]" id="comedy" value="comedy">
        <label for="comedy">Comedy</label>
        <input type="checkbox" name="genre[]" id="romance" value="romance">
        <label for="romance">Romance</label>
    </div>
    <div>
        <button class="button" type="submit" value="add_movie" name="add">Add Movie</button>
    </div>
</form>
</div>
<script>
    function validateForm() {
        let banner = document.getElementById("banner").files.length;
        let poster = document.getElementById("poster").files.length;
        let name = document.getElementById("name").value.trim();
        let desc = document.getElementById("desc").value.trim();
        let genres = document.querySelectorAll('input[name="genre[]"]:checked');

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
</script>
