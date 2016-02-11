<?php
include('../lib.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if(!is_null($username) && ! is_null($password)){
}

include('login.php');
