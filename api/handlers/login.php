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


// check if th user exists and credentials are correct
try{
    $stmt = $pdo->prepare('SELECT id FROM users WHERE name = ?');
    $stmt->execute([$data['username']]);
    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $pwd = $pdo->prepare('SELECT password FROM users WHERE name = ?');
        $pwd->execute([$data['username']]);
        $password = $pwd->fetch(PDO::FETCH_ASSOC);
        if($data['password'] == $password['password']){
            http_response_code(201); // Created
            echo json_encode([
                'message' => 'Login successful',
            ]);

        }
    }
    else{
        http_response_code(100);
        echo json_encode(["error"=>"The user doesn't exist"]);
    }

}catch(PDOException $e){
    http_response_code(500);
    echo json_encode(["error"=>"login failed"]);
}

// Return success response
