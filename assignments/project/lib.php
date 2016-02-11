<?php
function redirect_to($path)
{
    header('Location:'. 'http://' . $_SERVER['HTTP_HOST'] . $path);
    exit;
}