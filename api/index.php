<?php

declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$parts = explode("/", $path);


$resource = $parts[3];

if ($resource != "getAllStudents") {

    http_response_code(404);
    exit;
}


$user = new UserGateway($database);


$JwtCtrl = new Jwt($_ENV["SECRET_KEY"]);

$auth = new Auth($user, $JwtCtrl);

if (!$auth->authenticateJWTToken()) {
    exit;
}



$gateway = new StudentGateway($database);

$controller = new StudentController($gateway);



$controller->processRequest($_SERVER['REQUEST_METHOD']);
