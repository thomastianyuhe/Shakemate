
<?php

include_once("connection.php");


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$profile = $target_dir.$_FILES["fileToUpload"]["name"];

$fullname = $_REQUEST["fullname"];

$phone = $_REQUEST["phone"];

$mail = $_REQUEST["mail"];

$skype = $_REQUEST["skype"];

$bio = $_REQUEST["bio"];





$query = "INSERT INTO users SET fullname = '$fullname', phone = '$phone', mail = '$mail', skype = '$skype', bio = '$bio', profile = '$profile'";

$result = mysqli_query($db_select, $query);



if (!$result) {

    # Error in the query

    echo "Error running query $query : " . mysqli_error($db_select);

    exit;

}
echo "Success";



mysqli_close($db_select);

?>
