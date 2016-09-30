<?php

include 'config.php';

$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "INSERT INTO user (username, password, firstname, lastname) VALUES ('gdematraz', '1234', 'Grégoire', 'Dématraz')";

if ($db->query($sql) === TRUE) {
    echo "Utilisateur ajouté !";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();