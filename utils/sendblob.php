<?php
require_once 'utils/connect.php';

function sendCode($code, $language, $title, $description, $author, $author_avatar) {
    $conn = connect();
    $sql = "INSERT INTO codes (code, language, title, description, author, author_avatar) VALUES ('$code', '$language', '$title', '$description', '$author', '$author_avatar')";
    $conn->query($sql);
    disconnect($conn);
}

?>