<?php

include 'config.php';

if (isset($_POST['submit'])) {
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id = $_POST['userid'];

    $sql = "UPDATE user ";
    $sql .= "SET password = '$password', firstname = '$firstname', lastname = '$lastname' ";
    $sql .= "WHERE id = $id";

    $errorMessage = '';

    if ($con->query($sql) === TRUE) {
        echo "User modified successfully !";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $con->error;
        echo $errorMessage;
    }
    $con->close();
}
