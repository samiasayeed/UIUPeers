<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    
    $sql = "SELECT * FROM `users` WHERE `userid`='$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    if(isset($_POST['submit'])){
        $courseName = $_POST['courseName'];
        $courseCode = strtoupper($_POST['courseCode']);
        $creditHour = $_POST['creditHour'];
        $cPrerequisite = $_POST['cPrerequisite'];
        $cDescription = $_POST['cDescription'];
        $dept = $_POST['dept'];

        $sql = "INSERT INTO `course`(`c_name`, `c_code`, `department`, `creditHour`, `prereq`, `c_description`) 
        VALUES ('$courseName','$courseCode', '$dept','$creditHour','$cPrerequisite','$cDescription')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:A_courseList.php?userid='.$userId.'');
            echo "<script>alert('Course Added Successfully');</script>";
        }
        else{
            echo "<script>alert('Error');</script>";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course List-UIUPeers</title>
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
                        <a class="nav-link " aria-current="page"
                            href="adminPanel.php?userid=<?php echo $userId?>">Admin Panel</a>
                    </li>



                </ul>

                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php echo $name ?></a>
                    </li> -->
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar -->


    <br>
    <div class="container">
        <!-- <button type="button" class="btn btn-outline-primary"><a href="addCourse.php?userid=<?php echo $userId?>">ADD
                NEW Course</a></button> -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course name</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Credit/Hour</th>
                    <th scope="col">Department</th>
                    <th scope="col">Prerequisite</th>
                    <th scope="col">Description</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
            include 'connectdb.php';
            $sql = "SELECT * FROM `course`";
            $result = mysqli_query($conn, $sql);
            if($result){
            $serial = 1;
        while($row = mysqli_fetch_assoc($result)){
                    
                    $id = $row['c_id'];
                    $courseName = $row['c_name'];
                    $courseCode = $row['c_code'];
                    $creditHour = $row['creditHour'];
                    $department = $row['department'];
                    $prerequisite = $row['prereq'];
                    $description = $row['c_description'];
                    
                    echo '<tr>
                    <th scope="row">'.$serial.'</th>
                    <td>'.$courseName.'</td>
                    <td>'.$courseCode.'</td>
                    <td>'.$creditHour.'</td>
                    <td>'.$department.'</td>
                    <td>'.$prerequisite.'</td>
                    <td>
                        <p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidth'.$id.'" aria-expanded="false" aria-controls="collapseWidthExample">
                                Description
                            </button>
                            </p>
             
                    </td>
                    <td>
                    <div class="d-flex">
                    <button type="button" class="btn btn-secondary" style="margin-right:5px;"><a href="deleteCourse.php?cid='.$id.'&userid='.$userId.'" style="color:white; text-decoration:none; ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                            </a></button>
                                            
                    <button type="button" class="btn btn-secondary"><a href="updateCourse.php?cid='.$id.'&userid='.$userId.'" style="color:white; text-decoration:none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
                                            </a></button>
                    </div>
                    </td>
                
                    </tr>
                    <tr>
                    <td colspan="8">
                        <div class="collapse multi-collapse" id="collapseWidth'.$id.'">
                        <div class="card card-body">
                            '.$description.'
                        </div>
                        </div>
                    </tr>
                    ';
                    $serial++;
                }
                    
        }

    
    else{
        echo "No result found";
    }


    ?>
            </tbody>
        </table>

    </div>


    <div class="container d-flex justify-content-center">

        <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
            ADD NEW COURSE
        </button>


    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">ADD COURSE</p>
                        <!-- Course name -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Course name</label>
                            <input type="text" class="form-control" id="course_name" name="courseName">
                        </div>

                        <hr>
                        
                        <!-- Course Code -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Course Code</label>
                            <input type="text" class="form-control" id="course_code" name="courseCode">
                        </div>
                        
                        <!-- Department -->
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4c">
                                Department</label>
                            <select class="form-select" aria-label="Default select example"
                                id="dept_value" name="dept" onclick="deptOption()">
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="BBA">BBA</option>
                            </select>
                        </div>

                        <hr>

                        <!-- Credit Hour -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Credit Per Hour</label>
                            <input type="number" class="form-control" id="credit_hour" name="creditHour">
                        </div>

                        <hr>
                        
                        <!-- Prerequisite -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Prerequisite</label>
                            <input type="text" class="form-control" id="prerequisite" name="cPrerequisite" value="N/A">
                        </div>

                        <hr>
                        
                        <!-- Description -->
                        <div class="form-floating">
                            <label for="floatingTextarea2">Description</label>
                            <textarea class="form-control" placeholder="Leave course description here" id="description" name="cDescription" style="height: 100px"></textarea>
                        </div>

                        <hr>





                        <!-- Submit button -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3" id="submitbtn"
                                style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD MODAL END -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>