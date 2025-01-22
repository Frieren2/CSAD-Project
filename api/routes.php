<?php

// routing map for api calls
$ROUTES = [
    'getMovies' => __DIR__ . '/handlers/getMovies.php',
    'signup' => __DIR__ . '/handlers/signup.php',
    'login' => __DIR__.'/handlers/login.php',
];

return $ROUTES;