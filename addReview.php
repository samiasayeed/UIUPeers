<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $courseId = $_GET['cid'];

    $sql = "SELECT * FROM `course` WHERE `c_id`='$courseId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $courseName = $row['c_name'];
    $courseCode = $row['c_code'];
    $creditHour = $row['creditHour'];
    $department = $row['department'];
    $prerequisite = $row['prereq'];

    if(isset($_POST['submit'])){
        $review = $_POST['review_comment'];
        $sql = "INSERT INTO `courseReview` (`course_id`, `comment`, `reviewed_by`) VALUES ('$courseId', '$review', '$userId')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:courseReview.php?userid='.$userId.'');
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
    <title>Add course review-UIUPeers</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-8 offset-xl-1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Give Ratings</p>
                        <!-- Course name -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Faculty name</label>
                            <input type="text" class="form-control" id="faculty_name" name="facultyName"
                                value="<?php echo $courseName?>" disabled>
                        </div>
                       
                        <hr>
        
                        <!-- Course Code & credit -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Course Info</label>
                            <input type="text" class="form-control" id="faculty_name" name="facultyName"
                                value="<?php echo 'Department: '.$department. ' | Course Code: '.$courseCode.' | Credit: '.$creditHour ?>" disabled>
                        </div>

                        <hr>
                        
                        <!-- Review -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Give a short review of this course</label>
                            <textarea class="form-control" id="reviescmnt" name="review_comment" style="height: 100px"></textarea>
                        </div>

                        <hr>
        




                        <!-- Submit button -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3" id="submitbtn"
                                style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.getElementById("submitbtn").addEventListener("click", function() {
        let e = document.getElementById("reviescmnt").value;
        if (e == "") {
            alert("Please give a review");
        }
    });
    </script>
</body>

</html>