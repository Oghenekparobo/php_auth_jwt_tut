<?php
declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

$user = new UserGateway($database);


$gateway = new StudentGateway($database);

$controller = new StudentController($gateway);



$controller->processRequest($_SERVER['REQUEST_METHOD']);

