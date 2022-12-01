<?php

require_once '../components/components.php';
require_once './queries.php';

if (isset($_POST['user'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $bio = $_POST['bio'];
  $picture = $_POST['picture'];
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
  $title = $_POST['title'];
  $description = $_POST['description'];
  $code = $_POST['code'];
  $language = $_POST['language'];
  $user_profile_id  = $_POST['user_profile_id'];
  $result = insertSnippet($title, $description, $code, $language, $user_profile_id);
  if ($result) {
    header("Location: ../pages/snippetIndex.php");
  } else {
    error("Erro ao criar snippet");
  }
} else if (isset($_POST['reply'])) {
  $content = $_POST['content'];
  $snippet_id = $_POST['snippet_id'];
  $user_profile_id = $_POST['user_profile_id'];
  $result = insertReply($content, $user_profile_id, $snippet_id) ;
  if ($result) {
    header("Location: ../pages/replyIndex.php");
  } else {
    error("Erro ao comentar");
  }
} else {
  error("Erro ao atualizar");
}
