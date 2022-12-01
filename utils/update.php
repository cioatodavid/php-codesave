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
  $result = updateUser($id, $name, $email, $password, $bio, $picture, $user_type_id);
  if ($result) {
    header("Location: ../pages/userIndex.php");
  } else {
    error("Erro ao atualizar usuário");
  }
} else if (isset($_POST['snippet'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $code = $_POST['code'];
  $trigger = $_POST['trigger'];
  $user_id = $_POST['user_profile_id'];
  $result = updateSnippet($id, $title, $code, $trigger, $user_id);
  if ($result) {
    header("Location: ../pages/snippetIndex.php");
  } else {
    error("Erro ao atualizar snippet");
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
