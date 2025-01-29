<?php
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $courseId = $_GET['cid'];
    $sql = "SELECT * FROM `course` where `c_id` = '$courseId'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $courseName = $row['c_name'];
        $courseCode = $row['c_code'];
        $creditHour = $row['creditHour'];
        $department = $row['department'];
        $prerequisite = $row['prereq'];
        $description = $row['c_description'];

    }
    else{
        echo 'Error';
    }

    if(isset($_POST['submit'])){
        $courseName = $_POST['courseName'];
        $courseCode = $_POST['courseCode'];
        $creditHour = $_POST['creditHour'];
        $department = $_POST['dept'];
        $prerequisite = $_POST['cPrerequisite'];
        $description = $_POST['cDescription'];
        $sql = "UPDATE `course` SET `c_name` = '$courseName', `c_code` = '$courseCode', 
        `creditHour` = '$creditHour', `department` = '$department', `prereq` = '$prerequisite', 
        `c_description` = '$description' WHERE `c_id` = '$courseId'";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:A_courseList.php?userid='.$userId.'');
        }
        else{
            echo 'Error';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <title>UPDATE Course-UIUPeers</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">UPDATE COURSE</p>
                        <!-- Course name -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Course name</label>
                            <input type="text" class="form-control" id="course_name" name="courseName" value="<?php echo $courseName?>">
                        </div>

                        <hr>
                        
                        <!-- Course Code -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Course Code</label>
                            <input type="text" class="form-control" id="course_code" name="courseCode" value="<?php echo $courseCode?>">
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
                            <input type="number" class="form-control" id="credit_hour" name="creditHour" value="<?php echo $creditHour?>">
                        </div>

                        <hr>
                        
                        <!-- Prerequisite -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Prerequisite</label>
                            <input type="text" class="form-control" id="prerequisite" name="cPrerequisite" value="<?php echo $prerequisite?>">
                        </div>

                        <hr>
                        
                        <!-- Description -->
                        <div class="form-floating">
                            <label for="floatingTextarea2">Description</label>
                            <textarea class="form-control" placeholder="Leave course description here" id="description" name="cDescription" value="<?php echo $description?>" style="height: 100px"></textarea>
                        </div>

                        <hr>





                        <!-- Submit button -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3" id="submitbtn"
                                style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</body>

</html>