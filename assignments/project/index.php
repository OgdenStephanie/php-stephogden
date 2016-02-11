<?php
include('lib.php');

if(!isset($_SESSION['user'])){
    redirect_to('/account');
}

