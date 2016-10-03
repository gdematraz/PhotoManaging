<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO user (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";

    if ($db->query($sql) === TRUE) {
        echo "Utilisateur ajouté !";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
    $db->close();
}

header('Location: index.php');
