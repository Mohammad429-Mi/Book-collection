<?php
$servername="localhost:3306";
$username="root";
$password="";
$database="karma";

$con=mysqli_connect($servername,$username,$password,$database);

$msg = "";

if(isset($_POST['upload']))
{
    $imagename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $imagename;

    $query = "INSERT INTO `books`(`imagename`) VALUES ('$imagename')";

    mysqli_query($con,$query);

    if(move_uploaded_file($tempname, $folder))
    {
        echo "<h3> Image Uploaded successfully!</h3>";
    }
    else
    {
        echo "<h3>Failed to upload image!</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Upload</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
</body>
</html>