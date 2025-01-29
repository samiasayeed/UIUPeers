<?php 
        include 'connectdb.php';
        $courseId = $_GET['cid'];
        $userId = $_GET['userid'];
        $sql = "DELETE FROM `course` WHERE `c_id` = '$courseId'";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:A_courseList.php?userid='.$userId.'');
        }
        else{
            echo 'Error';
        }
?>