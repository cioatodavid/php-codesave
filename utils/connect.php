<?php

function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "codesave";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function disconnect($conn) {
    $conn->close();
}

?>