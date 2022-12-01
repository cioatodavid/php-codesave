<?php

require_once '../utils/queries.php';
require_once '../components/components.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $reply = deleteReply($id);
  if ($reply) {
    header("Location: ../pages/replyIndex.php");
  } else {
    error("Erro ao deletar comentário");
  }
}
