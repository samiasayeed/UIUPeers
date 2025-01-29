<?php 
    include 'connectdb.php';


    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $faculty_or_student = $_POST['faculty_or_student'];
        $uni_id = $_POST['uni_id'];
        $phoneNumber = $_POST['phoneNumber'];
        $dept = $_POST['dept'];
        $password = $_POST['password'];


       

        

        // check if email already exists 
    $uni_id_query = "select * from users where university_id='$uni_id' ";
    $query = mysqli_query($conn,$uni_id_query);

    $uni_id_count = mysqli_num_rows($query);

    if($uni_id_count>0){
        echo '<script>
        let errorText = document.getElementById("error_text");
        errorText.text = "This ID is already registered";
        </script>';
    }else{
         // upload all images
         $allowed = array('jpg', 'jpeg', 'png');

         $image_name = $_FILES['id_img']['name'];
         $image_tmp_name = $_FILES['id_img']['tmp_name'];

         $image_extension = explode('.', $image_name);
         $image_extension = strtolower(end($image_extension));

         $new_image_name = uniqid('', true).'.'.$image_extension;
         move_uploaded_file($image_tmp_name, "idImages/".$new_image_name);



        $sql = "INSERT INTO `users` (`username`, `email`, `job`, `university_id`, `phone`, `department`, `password`, `id_card_img`) 
        VALUES ('$name', '$email', '$faculty_or_student', '$uni_id', '$phoneNumber', '$dept', '$password', '$new_image_name')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("Location: login.php");
        }else{
            echo "Error: ".mysqli_error($conn);
        }
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


    <title>FooD Services</title>
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
                                    name="name" autocomplete="off" placeholder="enter your name"
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
                                    name="email" autocomplete="off" placeholder="enter your university mail"
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

                            </div>
                        </div>
                        <hr>

                        <div class="form-outline mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="university_id"><i class="bi bi-person-circle"></i>
                                    University ID</label>
                                <input type="text" id="university_id" class="form-control form-control-lg py-3"
                                    name="uni_id" autocomplete="off" placeholder="enter your ID"
                                    style="border-radius: 25px" required/>
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
                                    style="border-radius: 25px" />
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
                                    <option value="cse">CSE</option>
                                    <option value="eee">EEE</option>
                                    <option value="bba">BBA</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-outline mb-4">
                            <label for="idImg" class="form-label">Select Id card image</label>
                            <input type="file" class="form-control" id="idImg" name="id_img" required>
                        </div>
                        <hr>

                        <di<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="pass"><i class="bi bi-chat-left-dots-fill"></i>
                                    Password</label>
                                <input type="password" id="pass" class="form-control form-control-lg py-3"
                                    name="password" autocomplete="off" placeholder="enter your password"
                                    style="border-radius: 25px" />
                            </div>
                </div>




                <!-- submit button -->
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" value="Register" name="register"
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
    function deptOption() {
        let dept = document.getElementById("dept_value");
        let dept_value = dept.options[dept.selectedIndex].value;
        let dept_name = dept.options[dept.selectedIndex].text;

        if (dept_value == "cse") {
            dept_name = "CSE";
        } else if (dept_value == "eee") {
            dept_name = "EEE";
        } else {
            dept_name = "BBA";
        }
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