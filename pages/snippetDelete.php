<?php

require_once '../utils/queries.php';
require_once '../components/components.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $snippet = deleteSnippet($id);
  if ($snippet) {
    header("Location: ../pages/snippetIndex.php");
  } else {
    error("Erro ao deletar snippet");
  }
}
