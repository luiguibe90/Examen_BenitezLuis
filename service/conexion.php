<?php
function getConnection(){
    $conn = new mysqli("127.0.0.1", "root", "admin123", "gestion");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;

}
?>