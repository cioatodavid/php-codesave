<?php

require_once '../utils/queries.php';
require_once '../components/components.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $user = deleteUser($id);
  if ($user) {
    header("Location: ../pages/userIndex.php");
  } else {
    error("Erro ao deletar usuário");
  }
}
