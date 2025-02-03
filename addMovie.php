<h1 class="headers">Add Movie:</h1>
<form class="form" method="post" >
    <div>
        <label for="banner" class="banner-style" id="banner-style">
            <img src="resources/cloud-upload.png" width="50" id="preview-banner" alt="Upload Preview">
            <p>Upload Movie Banner</p>
        </label>
        <input type="file" id="banner" accept="image/png, image/jpg">
    </div>
    <div style="margin-top:20px">
        <label for="poster" class="poster-style" id="poster-style">
            <img src="resources/cloud-upload.png" width="50" id="preview-poster" alt="Upload Preview">
            <p>Upload Movie Poster</p>
        </label>
        <input type="file" id="poster" accept="image/png, image/jpg">
    </div>
    <div style="margin-top:20px; display: flex; align-items: center;">
    <label style="width: 150px;">Movie Name:</label>
    <input type="text" class="name" >
</div>
<div style="margin-top:20px; display: flex; align-items: center;">
    <label style="width: 150px;">Movie Description:</label>
    <textarea class="desc"></textarea>
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
        <input type="checkbox" name="genre" id="horror" value="horror">
        <label for="horror">Horror</label>
        <input type="checkbox" name="genre" id="action" value="action">
        <label for="action">Action</label>
        <input type="checkbox" name="genre" id="drama" value="drama">
        <label for="drama">Drama</label>
        <input type="checkbox" name="genre" id="comedy" value="comedy">
        <label for="comedy">Comedy</label>
        <input type="checkbox" name="genre" id="romance" value="romance">
        <label for="romance">Romance</label>
    </div>
    <div><button class="button" name="add" value="add_movie">Add Movie</button></div>
    
</form>
