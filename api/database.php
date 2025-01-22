<?php

// Placeholder data for movies
$movies = [
    ['id' => 1, 'title' => 'Inception', 'image' => '/images/inception.jpg', 'description' => 'A mind-bending thriller.'],
    ['id' => 2, 'title' => 'The Matrix', 'image' => '/images/matrix.jpg', 'description' => 'A hacker discovers reality is an illusion.'],
    ['id' => 3, 'title' => 'Interstellar', 'image' => '/images/interstellar.jpg', 'description' => 'Explorers venture through a wormhole in space.']
];

// Placeholder data for users
$users = [
    ['id' => 1, 'username' => 'john', 'passwordHash' => password_hash('password123', PASSWORD_BCRYPT)],
    ['id' => 2, 'username' => 'jane', 'passwordHash' => password_hash('123456', PASSWORD_BCRYPT)],
];



// get a user by username
function getUserByUsername($username) {
    global $users;
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null;
}

?>
