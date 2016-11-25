<?php

include 'config.php';


if (isset($_POST['submit'])) {
    $filename = $_FILES['file_upload']['name'];
    $temp_name = $_FILES['file_upload']['tmp_name'];

    $customname = $_POST['customname'];

    $location = 'img_upload/';
    $target = 'img_upload/'.$filename;

    $upload = move_uploaded_file($temp_name,$location.$filename);

    if ($upload) {
        echo 'Image uploaded successfully !';

        $query = mysqli_query($con , "INSERT INTO image(p_img,p_title)VALUES('".$target."','$customname')");
    } else {
        echo 'file not uploaded';
    }
}

