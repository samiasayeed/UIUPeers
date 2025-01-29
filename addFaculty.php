<?php
  include 'connectdb.php';

  $userId = $_GET['userid'];
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

<!DOCTYPE html>
<html lang="en">
<head>    
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <title>addFaculty</title>
</head>
<body>
<section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form action="" method="post" enctype="multipart/form-data">
              <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Add Faculty Info</p>
              <!-- Faculty name -->
              <div class="form-outline mb-4">
                <label for="faculty_name" class="form-label">Faculty name</label>
                <input type="text" class="form-control" id="faculty_name"
                name="facultyName"">
              </div>

              <!-- Email -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="faculty_mail">
                        Email</label>
                    <input type="email" id="faculty_mail" class="form-control"
                        name="facultyMail" />
                </div>

                <!-- Faculty designation -->
                <div class="form-outline mb-4">
                <label class="form-label" for="f_designation">
                        Designation</label>
                    <select class="form-select" aria-label="Default select example"
                        id="f_designation" name="designation">
                        <option value="Professor">Professor</option>
                        <option value="Associate Professor">Associate Professor</option>
                        <option value="Lecturer">Lecturer</option>
                    </select>
                </div>
                
                <!-- Department -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4c">
                        Department</label>
                    <select class="form-select" aria-label="Default select example"
                        id="dept_value" name="dept" >
                        <option value="cse">CSE</option>
                        <option value="eee">EEE</option>
                        <option value="bba">BBA</option>
                    </select>
                </div>

                <!-- Faculty image -->
                <!-- <div class="form-outline mb-4"> -->
                <label class="form-label" for="profile_img"> Profile image</label>
                    <input type="file" id="profile_img"
                        class="form-control form-control-lg py-3" name="faculty_profile_img"
                        style="border-radius: 25px" />
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
    </section>
</body>
</html>