<?php
include 'fetchCurrentMovie.php'; // Fetch movie details from database

if (!isset($conn)) {
    die("Error: Database connection failed.");
}

if (!isset($_GET['id'])) {
    echo "<h1>Error: No movie ID provided.</h1>";
    exit();
}

$movie_id = $_GET['id'];
$query = "SELECT * FROM movies WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $movie_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<h1>Error: Movie not found.</h1>";
    exit();
}

$movie = $result->fetch_assoc();
$posterImage = !empty($movie['poster']) ? 'data:image/jpeg;base64,' . base64_encode($movie['poster']) : 'resources/default-placeholder.png';
?>

<div>
<form class="form" method="post" action="updatemovies.php" enctype="multipart/form-data" onsubmit="return validateForm()">
<h1>Edit Movie:</h1>
<input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
<input type="hidden" name="existing_banner" value="<?php echo $movie['banner_path']; ?>">
<input type="hidden" name="existing_poster" value="<?php echo $posterImage; ?>">

    <div>
        <label for="banner" class="banner-style" id="banner-style">
            <img src="<?php echo $movie['banner_path']; ?>" width="50" id="preview-banner" alt="Upload Preview">
            <p>Upload Movie Banner</p>
        </label>
        <input type="file" id="banner" name="banner" accept="image/png, image/jpg">
    </div>

    <div style="margin-top:20px">
        <label for="poster" class="poster-style" id="poster-style">
            <img src="<?php echo $posterImage; ?>" width="50" id="preview-poster" alt="Upload Preview">
            <p>Upload Movie Poster</p>
        </label>
        <input type="file" id="poster" accept="image/png, image/jpg" name="poster">
    </div>

    <div style="margin-top:20px; display: flex; align-items: center;">
        <label style="width: 150px;">Movie Name:</label>
        <input type="text" class="name" name="name" id="name" value="<?php echo htmlspecialchars($movie['name']); ?>" required>
    </div>

    <div style="margin-top:20px; display: flex; align-items: center;">
        <label style="width: 150px;">Movie Description:</label>
        <textarea class="desc" name="desc" id="desc" required><?php echo htmlspecialchars($movie['description']); ?></textarea>
    </div>

    <div style="margin-top:20px">Movie Rating:
        <input type="radio" name="movieRating" id="PG" value="PG" value="PG" <?php echo ($movie['rating'] == 'PG') ? 'checked' : ''; ?>>
        <label for="PG" class="rating">PG</label>
        <input type="radio" name="movieRating" id="PG13" value="PG13" <?php echo ($movie['rating'] == 'PG13') ? 'checked' : ''; ?>>
        <label for="PG13" class="rating">PG13</label>
        <input type="radio" name="movieRating" id="NC16" value="NC16" <?php echo ($movie['rating'] == 'NC16') ? 'checked' : ''; ?>>
        <label for="NC16" class="rating">NC16</label>
        <input type="radio" name="movieRating" id="M18" value="M18" <?php echo ($movie['rating'] == 'M18') ? 'checked' : ''; ?>>
        <label for="M18" class="rating">M18</label>
        <input type="radio" name="movieRating" id="R21" value="R21" <?php echo ($movie['rating'] == 'R21') ? 'checked' : ''; ?>>
        <label for="R21" class="rating">R21</label>
    </div>

    <div style="margin-top:20px; display: flex; align-items: center;">Genre:
    <?php
        $genres = ['Horror', 'Action', 'Drama', 'Comedy', 'Romance'];
        $selectedGenres = array_map('trim', explode(',', $movie['genre']));

        foreach ($genres as $genre) {
            $checked = in_array($genre, $selectedGenres) ? 'checked' : '';
            echo "<input type='checkbox' name='genre[]' id='$genre' value='$genre' $checked>";
            echo "<label for='$genre'>$genre</label>";
        }
        ?>
    </div>
    <div>
        <button class="button" type="submit" value="update_movie" name="update">Update Movie</button>
    </div>
</form>
</div>