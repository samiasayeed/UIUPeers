<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $deleteSeat = $_GET['entryid'];

    $sql = "DELETE FROM `seat_image` WHERE `seat_id`='$deleteSeat'";
    $result = mysqli_query($conn, $sql);
    

    $sql = "DELETE FROM `seat_entry` WHERE `entryid`='$deleteSeat'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: accommodation.php?userid=$userId");
    }
    else{
        echo "Error: ".mysqli_error($conn);
    }
?>