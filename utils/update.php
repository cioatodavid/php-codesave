<?php

require_once '../components/components.php';
require_once './queries.php';

if (isset($_POST['user'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $bio = $_POST['bio'];
  $picture = $_POST['picture'];
  $user_type_id = $_POST['user_type_id'];
  if ($picture = '' || $picture = null) {
    $picture = 'https://cdn.discordapp.com/embed/avatars/0.png';
  }else{
    $picture = $_POST['picture'];
  }
  $result = updateUser($id, $name, $email, $password, $bio, $picture, $user_type_id);
  if ($result) {
    header("Location: ../pages/userIndex.php");
  } else {
    error("Erro ao atualizar usuário");
  }
} else if (isset($_POST['snippet'])) {
  $id = $_POST['id'];
  $snippet = $_FILES['blob'];
  $user_profile_id  = $_POST['user_profile_id'];
  $title = $_POST['title'];
  $trigger = $_POST['trigger'];
  if ($snippet['name'] != "" || $snippet['name'] != null) {
    $ext = pathinfo($snippet['name'], PATHINFO_EXTENSION);
    $blob = file_get_contents($snippet['tmp_name']);
    $blob = base64_encode($blob);
    $result = blobUpdateSnippet($id, $title, $blob, $trigger, $user_profile_id, $ext);
    if ($result) {
      header("Location: ../pages/snippetIndex.php");
    } else {
      error("Erro ao atualizar snippet");
    }
  } else {
    $result = updateSnippet($id, $title, $trigger, $user_profile_id);
    if ($result) {
      header("Location: ../pages/snippetIndex.php");
    } else {
      error("Erro ao atualizar snippet");
    }
  }
} else if (isset($_POST['reply'])) {
  $id = $_POST['id'];
  $content = $_POST['content'];
  $snippet_id = $_POST['snippet_id'];
  $user_id = $_POST['user_profile_id'];
  $result = updateReply($id, $content, $user_id, $snippet_id);
  if ($result) {
    header("Location: ../pages/replyIndex.php");
  } else {
    error("Erro ao atualizar reply");
  }
} else {
  error("Erro ao atualizar");
}
