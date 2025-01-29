<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $sql = "SELECT * FROM `users` WHERE `userid` = '$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];


    if(isset($_POST['submit'])){
        $facultyName = $_POST['facultyName'];
        $facultyMail = $_POST['facultyMail'];
        $dept = $_POST['dept'];
        $designation = $_POST['designation'];
        $faculty_profile_img = $_FILES['faculty_profile_img'];
    
        $filename = $faculty_profile_img['name'];
        $filepath = $faculty_profile_img['tmp_name'];
        $fileerror = $faculty_profile_img['error'];
    
        if($fileerror == 0){
          $destfile = 'faculty_images/'.$filename;
          move_uploaded_file($filepath, $destfile);
    
          $sql = "INSERT INTO `faculty` (`f_name`, `f_email`, `f_position`, `department`, `profile_image`) VALUES ('$facultyName', '$facultyMail', '$designation', '$dept', '$destfile')";
          $result = mysqli_query($conn, $sql);
    
          if($result){
            header("Location: facultyList.php?userid=$userId");
          }else{
            echo "<script>alert('Faculty not added');</script>";
          }
        }
      }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Control-UIUPeers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UIUPeers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="adminPanel.php?userid=<?php echo $userId?>">Admin Panel</a>
                    </li>



                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php echo $name ?></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar -->


    <br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Department</th>
                    <th scope="col">ProfileImage</th>
                    <th scope="col">Ratings</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
    include 'connectdb.php';
    $sql = "SELECT *  FROM `faculty`";
    $result = mysqli_query($conn, $sql);
    if($result){
      $serial = 1;
        while($row = mysqli_fetch_assoc($result)){
                    
                    $id = $row['faculty_id'];
                    $name = $row['f_name'];
                    $email = $row['f_email'];
                    $position = $row['f_position'];
                    $department = $row['department'];
                    $image = $row['profile_image'];
                    $sqlReview = "SELECT * FROM `facultyReview` WHERE  `faculty_id` = '$id'";
                    $resultReview = mysqli_query($conn, $sqlReview);
                    $num = mysqli_num_rows($resultReview);
                    $total = 0;
                    if($num > 0){
                    $rowReview = mysqli_fetch_assoc($resultReview);
                    $rating = $rowReview['rating'];
                    $teaching_method = $rowReview['teaching_method'];
                    $communication = $rowReview['communication_skill'];
                    $availability = $rowReview['availability'];
                    $take_feedback = $rowReview['take_feedback'];
                    $supportive = $rowReview['supportive'];
                    }
                    else{
                    $rating = 'No Rating';
                    $teaching_method = 'No Rating';
                    $communication = 'No Rating';
                    $availability = 'No Rating';
                    $take_feedback = 'No Rating';
                    $supportive = 'No Rating';
    
                    }
                    echo '<tr>
                    <th scope="row">'.$serial.'</th>
                    <td>'.$name.'</td>
                    <td>'.$position.'</td>
                    <td>'.$email.'</td>
                    <td>'.$department.'</td>
                    <td><img src="'.$image.'" alt="" width="100px" height="100px"></td>
                    <td><h6>Rating:'.$rating.'</h6>
                    <br>Teaching Method:'.$teaching_method.'
                    <br>Communication:'.$communication.'
                    <br>Availability:'.$availability.'
                    <br>Take Feedback:'.$take_feedback.'
                    <br>Supportive:'.$supportive.'</td>
                    <td>

                    <button type="button" class="btn btn-secondary"><a href="deleteFaculty.php?userid='.$userId.'&deleteid='.$id.'" style="color:white; text-decoration:none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                            </a></button>
                    </td>
                    </tr>';
                    $serial++;
                    
        }

    }
    else{
        echo "No result found";
    }


    ?>
            </tbody>
        </table>

        <div class="container d-flex justify-content-center">

            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                ADD NEW FACULTY
            </button>


        </div>


    </div>



    <!--add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD FACULTY</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <!-- Faculty name -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Faculty name</label>
                            <input type="text" class="form-control" id="faculty_name" name="facultyName"">
              </div>

              <!-- Email -->
                <div class=" form-outline mb-4">
                            <label class="form-label" for="faculty_mail">
                                Email</label>
                            <input type="email" id="faculty_mail" class="form-control" name="facultyMail" />
                        </div>

                        <!-- Faculty designation -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="f_designation">
                                Designation</label>
                            <select class="form-select" aria-label="Default select example" id="f_designation"
                                name="designation">
                                <option value="Professor">Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Lecturer">Lecturer</option>
                            </select>
                        </div>

                        <!-- Department -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4c">
                                Department</label>
                            <select class="form-select" aria-label="Default select example" id="dept_value" name="dept">
                                <option value="cse">CSE</option>
                                <option value="eee">EEE</option>
                                <option value="bba">BBA</option>
                            </select>
                        </div>

                        <!-- Faculty image -->
                        <!-- <div class="form-outline mb-4"> -->
                        <label class="form-label" for="profile_img"> Profile image</label>
                        <input type="file" id="profile_img" class="form-control form-control-lg py-3"
                            name="faculty_profile_img" style="border-radius: 25px" />
                        <!-- </div> -->


                        <!-- Submit button -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3"
                                style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add modal end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>