<?php

require_once '../utils/queries.php';
require_once '../components/components.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $snippet = getSnippetById($id);
  if ($snippet) {
    $ext = $snippet[0]['file_ext'];
    $id = $snippet[0]['id'];
    $blob = $snippet[0]['code'];
    $blob = base64_decode($blob);
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=snippet_$id.$ext");
    header("Content-Length: " . strlen($blob));
    echo $blob;
  } else {
    error("Erro ao baixar snippet");
  }
}
