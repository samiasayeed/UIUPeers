<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $foodId = $_GET['foodid'];
    
    $sql = "DELETE FROM food_s_review WHERE `service_id`='$foodId' AND `ratedBy`='$userId'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: foodServices.php?userid=$userId");
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
?>