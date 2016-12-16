<?php

session_start();

$logged = isset($_SESSION['user']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My account</title>

    <link href="Resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/css/bootstrap-theme.css" rel="stylesheet">
    <link href="Resources/css/Theme.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home Page</a></li>
            <li><a href="images.php">Images gallery</a></li>
            <li class="active"><a href="account.php">My Account</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1>My account</h1>
            <?php if ($logged): ?>
            <p>Hello <?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></p>
            <?php endif ?>

            <form class="" action="edituser.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $_SESSION['user']['username'] ?>">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" type="password" name="password" value="">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="firstname" value="<?php echo $_SESSION['user']['firstname'] ?>">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lastname" value="<?php echo $_SESSION['user']['lastname'] ?>">
                </div>
                <input name="userid" type="hidden" value="<?php echo $_SESSION['user']['id'] ?>">
                <div class="form-group">
                    <input type="submit" class="btn btn-default" name="submit" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>

<footer>
    <?php if ($logged): ?>
        <div class="container">
            <p>
                You are logged as <?= $_SESSION['user']['username']?>
            </p>
            <p>
                <a class="btn btn-default" href="logout.php">Logout</a>
            </p>
        </div>
    <?php endif; ?>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="Resources/js/bootstrap.min.js"></script>
</body>
</html>
