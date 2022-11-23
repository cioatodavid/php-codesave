<?php
function isLogged()
{
  if (!isset($_SESSION)) {
    session_start();
  }
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}

function isAdmin()
{
  if (!isset($_SESSION)) {
    session_start();
  }
  if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Admin') {
    return true;
  } else {
    return false;
  }
}

function checkPermission()
{
  if (!isLogged()) {
    header('Location: ../pages/login.php');
  }
}
