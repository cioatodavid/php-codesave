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

function getUsers()
{
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

function getUserById($id)
{
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

function getUserByEmail($email)
{
  $conn = connect();
  $sql = "SELECT * FROM user_profile WHERE email = '$email'";
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

function insertUser($name, $email, $password, $bio, $picture, $user_type_id)
{
  $conn = connect();
  $sql = "INSERT INTO user_profile (name, email, password, bio, picture, user_type_id) VALUES ('$name', '$email', '$password', '$bio', '$picture', '$user_type_id')";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function deleteUser($id)
{
  $conn = connect();
  $sql = "DELETE FROM user_profile WHERE id = $id";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function updateUser($id, $name, $email, $password, $bio, $picture, $user_type_id)
{
  $conn = connect();
  $sql = "UPDATE user_profile SET name = '$name', email = '$email', password = '$password', bio = '$bio', picture = '$picture', user_type_id = '$user_type_id' WHERE id = $id";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function getSnippets()
{
  $conn = connect();
  $sql = "SELECT * FROM snippet";
  $result = $conn->query($sql);
  $snippets = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $snippets[] = $row;
    }
  }
  disconnect($conn);
  return $snippets;
}

function getSnippetById($id)
{
  $conn = connect();
  $sql = "SELECT * FROM snippet WHERE id = $id";
  $result = $conn->query($sql);
  $snippet = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $snippet[] = $row;
    }
  }
  disconnect($conn);
  return $snippet;
}

function insertSnippet($title, $description, $code, $language, $user_id)
{
  $conn = connect();
  $sql = "INSERT INTO snippet (title, description, code, language, user_id) VALUES ('$title', '$description', '$code', '$language', '$user_id')";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function updateSnippet($id, $title, $code, $trigger, $user_profile_id)
{
  $conn = connect();
  $sql = "UPDATE snippet SET title = '$title', code = '$code', trigger = '$trigger', user_profile_id = '$user_profile_id' WHERE id = $id";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function deleteSnippet($id)
{
  $conn = connect();
  $sql = "DELETE FROM snippet WHERE id = $id";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function getReplies()
{
  $conn = connect();
  $sql = "SELECT * FROM reply";
  $result = $conn->query($sql);
  $replies = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $replies[] = $row;
    }
  }
  disconnect($conn);
  return $replies;
}

function getReplyById($id)
{
  $conn = connect();
  $sql = "SELECT * FROM reply WHERE id = $id";
  $result = $conn->query($sql);
  $replies = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $replies[] = $row;
    }
  }
  disconnect($conn);
  return $replies;
}

function insertReply($content, $user_profile_id, $snippet_id,)
{
  $conn = connect();
  $sql = "INSERT INTO reply (content, user_profile_id, snippet_id) VALUES ('$content', '$user_profile_id', '$snippet_id')";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function updateReply($id, $content, $user_profile_id, $snippet_id)
{
  $conn = connect();
  $sql = "UPDATE reply SET content = '$content', user_profile_id = '$user_profile_id', snippet_id = '$snippet_id' WHERE id = $id";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}

function deleteReply($id)
{
  $conn = connect();
  $sql = "DELETE FROM reply WHERE id = $id";
  $result = $conn->query($sql);
  disconnect($conn);
  return $result;
}
