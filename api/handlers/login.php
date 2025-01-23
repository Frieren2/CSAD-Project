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


// check if th user exists and credentials are correct


// Return success response
http_response_code(201); // Created
echo json_encode([
    'message' => 'Login successful',
]);
