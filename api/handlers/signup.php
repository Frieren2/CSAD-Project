<?php
require_once "database.php";
header('Content-Type: application/json');

// Get the raw POST body
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate input
// if (empty($data['username']) || empty($data['password'])) {
//     http_response_code(400); // Bad Request
//     echo json_encode(['error' => 'Username and password are required']);
//     exit;
// }

// Check if username already exists
// foreach ($users as $user) {
//     if ($user['username'] === $data['username']) {
//         http_response_code(409); // Conflict
//         echo json_encode(['error' => 'Username already exists']);
//         exit;
//     }
// }

// Simulate adding a new user to the database
$newUser = [
    'id' => count($users) + 1, // Increment ID
    'username' => $data['username'],
    'passwordHash' => password_hash($data['password'], PASSWORD_BCRYPT), // Hash the password
];
$users[] = $newUser; // Add to the "database"

// Return success response
http_response_code(201); // Created
echo json_encode([
    'message' => 'Signup successful',
    'user' => [
        'id' => $newUser['id'],
        'username' => $newUser['username'],
    ]
]);
