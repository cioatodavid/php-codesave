<?php

require_once '../components/components.php';
require_once './queries.php';

if (isset($_POST['user'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $bio = $_POST['bio'];
  if ($picture = '' || $picture = null) {
    $picture = 'https://cdn.discordapp.com/embed/avatars/0.png';
  } else {
    $picture = $_POST['picture'];
  }
  $user_type_id = $_POST['user_type_id'];
  $already = getUserByEmail($email);
  if (count($already) > 0) {
    error("Email já cadastrado");
    echo "<script>setTimeout(function(){window.location.href='../pages/userInsert.php'}, 2000);</script>";
  } else {

    $result = insertUser($name, $email, $password, $bio, $picture, $user_type_id);
    if ($result) {
      header("Location: ../pages/userIndex.php");
    } else {
      error("Erro ao inserir usuário");
      echo "<script>setTimeout(function(){window.location.href='../pages/userInsert.php'}, 2000);</script>";
    }
  }
} else if (isset($_POST['snippet'])) {
  $snippet = $_FILES['blob'];
  $user_profile_id  = $_POST['user_profile_id'];
  $title = $_POST['title'];
  $trigger = $_POST['trigger'];
  $ext = pathinfo($snippet['name'], PATHINFO_EXTENSION);
  $blob = file_get_contents($snippet['tmp_name']);
  $blob = base64_encode($blob);
  $result = blobInsertSnippet($title, $blob, $trigger, $user_profile_id, $ext);
  if ($result) {
    header("Location: ../pages/snippetIndex.php");
  } else {
    error("Erro ao inserir snippet");
    echo "<script>setTimeout(function(){window.location.href='../pages/snippetInsert.php'}, 2000);</script>";
  }
} else if (isset($_POST['reply'])) {
  $content = $_POST['content'];
  $snippet_id = $_POST['snippet_id'];
  $user_profile_id = $_POST['user_profile_id'];
  $result = insertReply($content, $user_profile_id, $snippet_id);
  if ($result) {
    header("Location: ../pages/replyIndex.php");
  } else {
    error("Erro ao inserir resposta");
    echo "<script>setTimeout(function(){window.location.href='../pages/replyIndex.php'}, 2000);</script>";
  }
}
