<?php
  include 'connectdb.php';

  $userId = $_GET['userid'];

  $sql = "SELECT username, job FROM `users` WHERE `userid`='$userId'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  $name = $row['username'];
  $job = $row['job'];


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Review</title>
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
                        <a class="nav-link " aria-current="page" href="index1.php?userid=<?php echo $userId?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="bookdisplay.php?userid=<?php echo $userId?>">Book Exchange</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="coursereview.php?userid=<?php echo $userId?>">Course Review</a>
                    </li>

                    <li class="nav-item" id="faculty_rating">
                        <a class="nav-link" href="facultyRating.php?userid=<?php echo $userId?>">Faculty Rating</a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link" href="foodServices.php?userid=<?php echo $userId?>">Food Services</a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link" href="accommodation.php?userid=<?php echo $userId?>">Accommodation</a>
                    </li>



                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php echo $name ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">logout</a>
                    </li>
                </ul>

            </div>
    </nav>
    <!-- navbar -->


    <br>
    <div class="container">
        <!-- <button type="button" class="btn btn-outline-primary"><a href="addbooks.php">Add Book</a></button> -->

        <table class="table">
            <thead>
                <!-- <p>Faculty Ratings</p> -->
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Credit Hour</th>
                    <th scope="col">Department</th>
                    <th scope="col">Prerequisite</th>
                    <th scope="col">Description</th>
                    <th scope="col">Review</th>
                    <th scope="col">Action</th>
                </tr>
            <tbody class="table-group-divider">


                <?php
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

    $sql = "SELECT * FROM `courseReview` WHERE `course_id`='$id'";
    $result2 = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result2);
    
    $reviewarray = array();
    while($row2 = mysqli_fetch_assoc($result2)){
        $reviewedby = $row2['reviewed_by'];
        $sql = "SELECT * FROM `users` WHERE `userid`='$reviewedby'";
        $result3 = mysqli_query($conn, $sql);
        $row3 = mysqli_fetch_assoc($result3);
        $reviewarray[] = $row2['comment'] . '       (posted by ' . $row3['username'].')';

    }
    $review = implode('<br><hr>', $reviewarray);
    
    
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
    <p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#reviews'.$id.'" aria-expanded="false" aria-controls="collapseWidthExample">
        Check Comments
    </button>
    </p>
    </td>
    <td>
    <a href="addReview.php?cid='.$id.'&userid='.$userId.'"><button type="button" class="btn btn-outline-primary">Give Review</button></a></td>
    </tr>
    <tr>
    <td colspan="9">
        <div class="collapse multi-collapse" id="collapseWidth'.$id.'">
        <div class="card card-body">
            '.$description.'
        </div>
        </div>
    </td>
    </tr>
    <tr>
    <td colspan="8">
        <div class="collapse multi-collapse" id="reviews'.$id.'">
        <div class="card card-body">
            '.$review.'
        </div>
        </div>
    </td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>


<!-- Check faculty or student -->
<script>
let faculty_or_student = "<?php echo $job ?>";
if (faculty_or_student == "F") {
    document.querySelectorAll("#faculty_rating").forEach((e) => e.style.display = "none");
}
</script>

</html>