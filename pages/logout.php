<?php
if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('Location: ../pages/login.php');
}


?>