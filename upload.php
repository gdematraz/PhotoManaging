<?php

include 'config.php';

?>

<style>
    .im  {
        width: 150px;
    }
</style>

<?php

if (isset($_POST['submit'])) {
    $name = $_FILES['file_upload']['name'];
    $tmp_name = $_FILES['file_upload']['tmp_name'];
    $location = 'img_upload/';
    $target = 'img_upload/'.$name;

    if (move_uploaded_file($tmp_name,$location.$name)) {
        echo 'Image uploaded successfully !';

        $nam = $_POST['name'];
        $query = mysqli_query($con , "INSERT INTO image(p_img,p_title)VALUES('".$target."','$name')");
    } else {
        echo 'file not uploaded';
    }
}

$result = mysqli_query($con , "SELECT * FROM image");

while($row = mysqli_fetch_array($result)) {
    echo "<img src=".$row['p_img']." &nbsp; class='im'>";
}

