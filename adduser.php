<?php

include 'config.php';

$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "INSERT INTO user (username, password, firstname, lastname) VALUES ('test', '1233', 'test', 'test')";

if ($db->query($sql) === TRUE) {
    echo "Utilisateur ajouté !";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$db->close();