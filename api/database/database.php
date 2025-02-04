<?php
require_once __DIR__ . '/config.php';

try {

    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}
