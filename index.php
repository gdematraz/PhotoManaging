<?php

session_start();

$logged = isset($_SESSION['user']);

$flash = '';
if (isset($_SESSION['flash'])) {
  $flash = $_SESSION['flash'];

  $_SESSION['flash'] = "";
  unset($_SESSION['flash']);
}

$title = $logged
       ? $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname']
       : "Please login !";

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?></title>

    <link href="Resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/css/bootstrap-theme.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
    <?php if (mb_strlen($flash) > 0): ?>
      <div class="flash">
        <?= $flash ?>
      </div>
    <?php endif ?>
    <p>
      <a href="secret.php">Page secrète</a>
    </p>

    <?php
    ?>
    <?php if ($logged): ?>
      <h1>Bonjour <?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></h1>
      <p>
        <?php
        ?>
        Vous êtes loggué en tant que <?= $_SESSION['user']['username'] ?>
      </p>
      <p>
        <a href="logout.php">Logout</a>
      </p>
    <?php else: ?>
      <?php
      ?>
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
            </div>
          </form>
        </div>
      </div>

    </div>

    <?php endif ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="Resources/js/bootstrap.min.js"></script>
  </body>
</html>