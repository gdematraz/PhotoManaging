<?php

session_start();

$logged = isset($_SESSION['user']);

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];

    $_SESSION['message'] = "";
    unset($_SESSION['message']);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>PhotoManaging</title>

	<link href="Resources/css/bootstrap.min.css" rel="stylesheet">
	<link href="Resources/css/bootstrap-theme.css" rel="stylesheet">
	<link href="Resources/css/Theme.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home Page</a></li>
            <?php if ($logged): ?>
				<li><a href="images.php">Images gallery</a></li>
				<li><a href="account.php">My Account</a></li>
            <?php endif; ?>
		</ul>
	</div>
</nav>
<div class="container" id="mainContent">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<h1>PhotoManaging</h1>

            <?php if (mb_strlen($message) > 0): ?>
				<div class="message">
                    <?= $message ?>
				</div>
            <?php endif ?>

            <?php if ($logged): ?>
				<b>Hello <?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></b>
				<a class="btn btn-default" href="createuser.php">Add new user</a>

            <?php else: ?>

				<form class="" action="login.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username" value="">
					</div>
					<div class="form-group">
						<label>password</label>
						<input class="form-control" type="password" name="password" value="">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default" name="submit" value="Log me in">
						<a class="btn btn-default" href="createuser.php">Add new user</a>
					</div>
				</form>
            <?php endif; ?>
		</div>
	</div>
</div>

<footer>
    <?php if ($logged) { ?>
		<div class="container">
			<p>
				You are logged as <?= $_SESSION['user']['username'] ?>
			</p>
			<p>
				<a class="btn btn-default" href="logout.php">Logout</a>
			</p>
		</div>
    <?php } ?>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="Resources/js/bootstrap.min.js"></script>
</body>
</html>
