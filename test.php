<?php
/**
 * Created by PhpStorm.
 * User: gregoire.dematraz
 * Date: 30.09.2016
 * Time: 14:45
 */


include 'config.php';

$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT username, password, firstname, lastname FROM user";

$result = $db->query($query);

if ($result -> num_rows > 0 ) {
    while ($row = $result-> fetch_assoc()) {
        echo "Nom d'utilisateur: " . $row["username"]. " - Mot de passe: " . $row["password"] . " - Prénom : " . $row["firstname"] . " - Nom de famille : " . $row["lastname"]. "<br>";
    }
} else {
    echo "Nothing in the database, please add data.";
}

$db -> close();
