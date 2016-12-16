<?php

include 'config.php';

if (isset($_POST['submit'])) {
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id = $_POST['userid'];

    $sql = "UPDATE user ";
    $sql .= "SET username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname' ";
    $sql .= "WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "User modified successfully !";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
}
