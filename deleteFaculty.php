<?php 
    include 'connectdb.php';
    $id = $_GET['deleteid'];
    $userId = $_GET['userid'];
    $sql = "DELETE FROM `faculty` WHERE `faculty_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:facultyList.php?userid='.$userId.'');
    }
    else{
        echo 'Error';
    }
?>