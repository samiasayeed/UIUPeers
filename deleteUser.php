<?php 
    include 'connectdb.php';
    $userid = $_GET['userid'];

if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $sql = "Delete from users where userid = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: userList.php?userid=$userid");
    }
    else{
        die(mysqli_error($conn));
    }
}
?>