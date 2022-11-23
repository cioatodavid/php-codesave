<?php

include 'connect.php';

function countTable($table)
{
  $conn = connect();
  $sql = "SELECT COUNT(*) FROM $table";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $res = $row['COUNT(*)'];
  disconnect($conn);
  return $res;
}

function getUsers(){
  $conn = connect();
  $sql = "SELECT * FROM user_profile";
  $result = $conn->query($sql);
  $users = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
  }
  disconnect($conn);
  return $users;
}

function getUserById($id){
  $conn = connect();
  $sql = "SELECT * FROM user_profile WHERE id = $id";
  $result = $conn->query($sql);
  $user = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $user[] = $row;
    }
  }
  disconnect($conn);
  return $user;
}

?>