<?php

include 'config.php';

session_start();

$logged = isset($_SESSION['user']);

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create your user</title>

        <link href="Resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="Resources/css/bootstrap-theme.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home Page</a></li>
                <li><a href="createuser.php">Add new user</a></li>
                <li><a href="images.php">Images gallery</a></li>
            </ul>

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1>PhotoManaging</h1>


                <?php if ($logged): ?>
                    <p class="state">
                        You are logged as <?= $_SESSION['user']['username']?>
                        </br><a class="btn btn-default" href="logout.php">Logout</a>
                    </p>
                <?php else: ?>

                <h2>Add new user</h2>
                <form class="" action="adduser.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" value="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="firstname" value="">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="lastname" value="">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" name="submit" value="Create user">
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="Resources/js/bootstrap.min.js"></script>
    </body>
</html>
