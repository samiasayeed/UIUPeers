<?php 
include 'connectdb.php';
$foodid = $_GET['foodid'];
$userid = $_GET['userid'];

$sql = "DELETE FROM foodServices WHERE service_id = '$foodid'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: foodServices.php?userid=$userid");
} else {
    echo "fail";
    die(mysqli_error($conn));
}
?>