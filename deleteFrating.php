<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $rateId = $_GET['rateid'];
    $sql = "DELETE FROM `facultyReview` WHERE `faculty_id` = '$rateId' AND `rated_by` = '$userId'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:facultyRating.php?userid='.$userId.'');
    }
    else{
        echo 'Error';
    }

?>