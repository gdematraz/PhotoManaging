<?php

session_start();

$logged = isset($_SESSION['user']);

include 'config.php';
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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home Page</a></li>
            <li class="active"><a href="images.php">Images gallery</a></li>
            <li><a href="account.php">My Account</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Images Gallery</h1>

            <?php if ($logged): ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file_upload">File</label>
                    <input id="file_upload" type="file" name="file_upload" />
                </div>
                <div class="form-group">
                    <label for="customName">Name</label>
                    <input class="form-control" type="text" id="customName" name="customName" />
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category">
                        <?php
                            $resultCat = mysqli_query($con, "SELECT * FROM categories");

                            while ($rowCat = mysqli_fetch_array($resultCat)) {
                                echo "<option value='"
                                    . $rowCat['name']
                                    . "'>"
                                    . $rowCat['name']
                                    . "</option>";
                            };
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default" name="submit">Upload</button>
                <hr />
            </form>
        </div>
        <div class="col-md-3">
            <div class="button-group filter-button-group">
                <button class="btn btn-danger btn-block" data-filter="*">show all</button>

                <?php
                $resultCat = mysqli_query($con, "SELECT * FROM categories");

                while ($rowCat = mysqli_fetch_array($resultCat)) {
                    echo "<button class='btn btn-default btn-block' data-filter='."
                        . $rowCat['name']
                        . "'>"
                        . $rowCat['name']
                        . "</button>";
                };
                ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="grid">
                <?php
                $resultIm = mysqli_query($con , "SELECT * FROM image");

                while($rowIm = mysqli_fetch_array($resultIm)) {
                    echo "<a class='fancybox element-item col-md-3 "
                        . $rowIm['p_category']
                        . "' href="
                        . $rowIm['p_img']
                        . " rel='lightbox'><img class='img-gallery' src="
                        . $rowIm['p_img']
                        . " title='"
                        . $rowIm['p_title']
                        . "''></a>" ;
                } ?>
            </div>
        </div>
        <?php else: ?>

        <p>You are not logged</p>
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
<?php endif ?>
    </div>
</div>

<footer>
    <div class="container">
        <p>
            You are logged as <?= $_SESSION['user']['username']?>
        </p>
        <p>
            <a class="btn btn-default" href="logout.php">Logout</a>
        </p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="Resources/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3.0.1/dist/isotope.pkgd.min.js"></script>
<script src="Resources/js/Theme.js"></script>
</body>
</html>
