<?php
require_once __DIR__ . '/../database.php';

// return all movies
function getMovies() {
    global $movies;
    return $movies;
}

// return a movie by ID
function getMovieById($id) {
    global $movies;
    foreach ($movies as $movie) {
        if ($movie['id'] == $id) {
            return $movie;
        }
    }
    return null;
}

// check for parameters
$param = $_GET['param'] ?? null;

if ($param) {
    $id = intval($param['id'] ?? 0);
    if ($id > 0) {
        $movie = getMovieById($id);
        if ($movie) {
            echo json_encode($movie);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Movie not found']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid movie ID']);
    }
} else {
    // get all movies if no param
    $movies = getMovies();
    echo json_encode(['movies' => $movies]);
}
