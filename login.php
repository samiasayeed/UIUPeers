<?php
session_start();
include('connectdb.php');

if (isset($_POST['login'])) {

    $uiu_id = $_POST['uiu_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `university_id`='$uiu_id' AND `password`='$password' AND `approve`='1'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $poistion = $row['job'];
    $userId = $row['userid'];
    
    


    if (empty($_POST['uiu_id']) && empty($_POST['password'])) {
        echo "<script>alert('Please Fill UIU ID and Password');</script>";
        
    } elseif (empty($_POST['password'])) {
        echo "<script>alert('Please Fill Password');</script>";
      
    } elseif (empty($_POST['uiu_id'])) {
        echo "<script>alert('Please Fill UIU ID');</script>";
       
    } else {
        if (mysqli_num_rows($result) > 0) {

            if ($poistion == 'stu') {
                header('location:index1.php?userid='.$userId.'');
            } elseif ($poistion == 'fac') {
                header('location:index1.php?userid='.$userId.'&job='.$poistion.'');
            } elseif ($poistion == 'A') {
                header('location:adminPanel.php?userid='.$userId.'');
            }
            
        } else {
            header('location:login.php');
            
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="login.php" method="post">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Login </p>

                        <!-- UIU ID -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="uni_id_input"> <i class="bi bi-person-circle"></i> UIU
                                ID</label>
                            <input type="number" id="uni_id_input" class="form-control form-control-lg py-3"
                                name="uiu_id" autocomplete="off" placeholder="enter your university id"
                                style="border-radius:25px ;" />

                        </div>
                        <!-- error -->
                        <div class="text-danger" id="uiu_id_error"></div>



                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i>
                                Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg py-3"
                                name="password" autocomplete="off" placeholder="enter your password"
                                style="border-radius:25px ;" />

                        </div>

                        <!-- error -->
                        <div class="text-danger" id="password_error"></div>


                        <!-- Submit button -->
                        <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input type="submit" value="Sign in" name="login"
                                class="btn btn-warning btn-lg text-light my-2 py-3"
                                
                                style="width:100% ; border-radius: 30px; font-weight:600;" />
                        </div>

                    </form><br>
                    <p align="center">i don't have any account <a href="register1.php" class="text-warning"
                            style="font-weight:600;text-decoration:none;">Register Here</a></p>

                </div>
            </div>
        </div>
    </section>



    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script> -->
</body>

</html>