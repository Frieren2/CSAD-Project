<?php
// the router is returning json
header('Content-Type: application/json');

$routes = require 'routes.php';
// extracting values from api call 
$route = $_GET['route'] ?? null;

// check if the call is valid / the route exists
if (isset($routes[$route])) {
    require_once $routes[$route];
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found']);
}