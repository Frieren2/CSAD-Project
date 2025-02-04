<?php
header('Content-Type: application/json');
require_once __DIR__."/../database/database.php";

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


try {
    // Check if the username already exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE name = ?');
    $stmt->execute([$data['username']]);
    if ($stmt->fetch()) {
        http_response_code(409); // Conflict
        echo json_encode(['error' => 'Username already exists']);
        exit;
    }

    if($data['email'] == null){
        http_respones_code(111);
    echo json_encode(['error' => 'email is null']);
    }
    // Insert the new user into the database
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->execute([
        $data['username'],
        $data['email'],
        $data['password']
    ]);

    // Respond with success
    http_response_code(201); // Created
    echo json_encode([
        'message' => 'Signup successful',
        'user' => [
            'id' => $pdo->lastInsertId(), // Get the ID of the inserted row
            'username' => $data['name'],
        ]
    ]);

} catch (PDOException $e) {
    // Handle database errors
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}