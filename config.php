<?php
/**
 * Created by PhpStorm.
 * User: Gregoire.DEMATRAZ
 * Date: 09.09.2016
 * Time: 15:23
 */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_photo_managing');
$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
