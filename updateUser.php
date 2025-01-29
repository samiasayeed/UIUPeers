<?php 
    include 'connectdb.php';

    $userid = $_GET['userid'];
    $updateId = $_GET['updateid'];

    $sql = "SELECT * FROM `users` WHERE userid='$updateId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['username'];
    $phone = $row['phone'];
    $email = $row['email'];
    $type = $row['job'];
    $uni_id = $row['university_id'];
    $dept = $row['department'];
    $card = $row['id_card_img'];
    $approve = $row['approve'];



    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $faculty_or_student = $_POST['faculty_or_student'];
        $uni_id = $_POST['uni_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $dept = $_POST['dept'];
        $password = $_POST['password'];

        //Deleting prevesious image if changed
        $id_card = $_FILES['id_img']['name'];
        $allowed = array('jpg', 'jpeg', 'png');
        if($id_card == ""){
            $new_image_name = $card;
            $image_tmp_name = $card;
            move_uploaded_file($image_tmp_name, "idImages/".$new_image_name);
       
            
        }
        else{
            unlink("idImages/".$card);

            $image_name = $_FILES['id_img']['name'];
            $image_tmp_name = $_FILES['id_img']['tmp_name'];

            $image_extension = explode('.', $image_name);
            $image_extension = strtolower(end($image_extension));

            $new_image_name = uniqid('', true).'.'.$image_extension;
            move_uploaded_file($image_tmp_name, "idImages/".$new_image_name);

        }


           
        

        $sql = "UPDATE `users` SET `username`='$name',`email`='$email',`job`='$faculty_or_student',
        `university_id`='$uni_id',`phone`='$phoneNumber',`department`='$dept',`password`='$password',`id_card_img`='$new_image_name' 
        WHERE userid='$updateId'";
      
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: userList.php?userid=".$userid."");
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <title>Update User-UIUPeers</title>
</head>

<body>


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <form class="mx-1 mx-md-4" action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Sign up</p>

                        <div class="form-outline mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="regform1name"><i class="bi bi-person-circle"></i> Your
                                    Name</label>
                                <input type="text" id="regform1name" class="form-control form-control-lg py-3"
                                    name="name" autocomplete="off" placeholder="enter your name" value="<?php echo $name ?>"
                                    style="border-radius: 25px" />
                            </div>
                        </div>
                        <hr>

                        <div class="form-outline mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="regform1mail"><i class="bi bi-envelope-at-fill"></i> Your
                                    University Email</label>
                                <input type="email" id="regform1mail" class="form-control form-control-lg py-3"
                                    name="email" autocomplete="off" placeholder="enter your university mail" value="<?php echo $email ?>"
                                    style="border-radius: 25px" />
                            </div>
                        </div>
                        <hr>


                        <div class="form-outline mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">

                                <input type="radio" class="btn-check" name="faculty_or_student" id="faculty_radio"
                                    autocomplete="off" value="F">
                                <label class="btn btn-outline-success" for="faculty_radio">Faculty</label>

                                <input type="radio" class="btn-check" name="faculty_or_student" id="student_radio"
                                    autocomplete="off" value="S">
                                <label class="btn btn-outline-success" for="student_radio">Student</label>
                                
                                <input type="radio" class="btn-check" name="faculty_or_student" id="admin_radio"
                                    autocomplete="off" value="A">
                                <label class="btn btn-outline-success" for="admin_radio">Admin</label>

                            </div>
                        </div>
                        <hr>

                        <div class="form-outline mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="university_id"><i class="bi bi-person-circle"></i>
                                    University ID</label>
                                <input type="text" id="university_id" class="form-control form-control-lg py-3"
                                    name="uni_id" autocomplete="off" placeholder="enter your ID" value="<?php echo $uni_id ?>"
                                    style="border-radius: 25px" />
                            </div>
                        </div>
                        <hr>


                        <div class="form-outline mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="university_id"><i class="bi bi-person-circle"></i> Phone
                                    Number</label>
                                <input type="tel" id="phone_number" class="form-control form-control-lg py-3"
                                    name="phoneNumber" autocomplete="off" placeholder="enter your phone number"
                                    value="<?php echo $phone ?>" style="border-radius: 25px" />
                                <p>Format: 01XXXXXXXXX</p>
                            </div>
                        </div>
                        <hr>


                        <div class="form-outline mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example4c"><i class="bi bi-buildings-fill"></i>
                                    Department</label>
                                <select class="form-select" aria-label="Default select example" id="dept_value"
                                    name="dept" onclick="deptOption()">
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="BBA">BBA</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-outline mb-4">
                            <label for="idImg" class="form-label">Select Id card image</label>
                            <img src="idImages/<?php echo $card ?>" alt="" width="100px" height="100px" style="margin:10px;">
                            <input type="file" class="form-control" id="idImg" name="id_img">
                        </div>
                        <hr>

                        <di<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="pass"><i class="bi bi-chat-left-dots-fill"></i>
                                    Password</label>
                                <input type="password" id="pass" class="form-control form-control-lg py-3"
                                    name="password" autocomplete="off" placeholder="enter your password"
                                    value="<?php echo $password ?>"  style="border-radius: 25px" />
                            </div>
                </div>




                <!-- submit button -->
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" value="Register" name="update"
                        class="btn btn-warning btn-lg text-light my-2 py-3" style="
                                                      width: 100%;
                                                      border-radius: 30px;
                                                      font-weight: 600;
                                                    " style="border-radius: 25px" />

                </div>
                </form>

                <p align="center">
                    i have already account
                    <a href="login.php" class="text-warning" style="font-weight: 600; text-decoration: none">Login</a>
                </p>

            </div>
        </div>
        </div>
    </section>

</body>

<script>
    document.getElementById("dept_value");
    document.getElementById("faculty_radio");
    document.getElementById("student_radio");
    if ("<?php echo $type ?>" == "F") {
        document.getElementById("faculty_radio").checked = true;

    } else if ("<?php echo $type ?>" == "A") {
        document.getElementById("admin_radio").checked = true;}
    else {
        document.getElementById("student_radio").checked = true;
    }

    if ("<?php echo $dept ?>" == "CSE") {
        document.getElementById("dept_value").value = "CSE";
    } else if ("<?php echo $dept ?>" == "EEE") {
        document.getElementById("dept_value").value = "EEE";
    } else {
        document.getElementById("dept_value").value = "BBA";
    }

 
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</html>