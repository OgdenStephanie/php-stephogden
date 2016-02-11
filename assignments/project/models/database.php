<?php
$dsn = 'mysql:host=localhost;dbname=cs313';
$username = 'homestead';
$password = 'secret';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
