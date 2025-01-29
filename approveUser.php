<?php 
    include 'connectdb.php';
    $id = $_GET['approveId'];
    $userId = $_GET['userid'];

    $sql = "SELECT approve FROM `users` WHERE userid = '$id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $approve = $row['approve'];
    if($approve == 0){
        $sql1 = "UPDATE `users` SET approve = true WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql1);
        if($result){
            header("Location: userList.php?userid=".$userId);
        }
    }
    else{
        $sql1 = "UPDATE `users` SET approve = false WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql1);
        if($result){
            header("Location: userList.php?userid=".$userId);
        }
    }

?>