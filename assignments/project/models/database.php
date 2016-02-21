<?php
$dsn = 'mysql:host=localhost;dbname=php';
$username = 'adminRgaLVwe';
$password = 'show';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
