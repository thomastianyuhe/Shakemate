<?php
include_once("connection.php");

$user = $_GET["user_id"];

$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($db_select, $query);

if (!$result) {
    # Error in the query
    echo "Error running query $query : " . mysqli_error($db_select);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    # No results found
    echo "No results";
}


while($row = mysqli_fetch_assoc($result)) {
    echo $row;
}

mysqli_close($db_select);
?>