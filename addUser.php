<?php
include_once("connection.php");

$fullname = $_GET["fullname"];
$phone = $_GET["phone"];
$mail = $_GET["mail"];
$skype = $_GET["skype"];
$bio = $_GET["bio"];
$profile = $_GET["profile"];

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