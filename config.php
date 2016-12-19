<?php
/**
 * Created by PhpStorm.
 * User: Gregoire.DEMATRAZ
 * Date: 09.09.2016
 * Time: 15:23
 */
include 'User.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'photo_managing');

$con = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$user = new User($con);
