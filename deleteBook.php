<?php
include 'connectdb.php';
$userId = $_GET['userid'];
if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $sql = "Delete from booksdetail where book_id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:bookdisplay.php?userid='.$userId.'');
    }
    else{
        echo "Data not deleted successfully";
        die(mysqli_error($conn));
    }
}
?>