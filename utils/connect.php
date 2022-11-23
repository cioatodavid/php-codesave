<?php

function connect() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "codesave";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function disconnect($conn) {
    $conn->close();
}

?>