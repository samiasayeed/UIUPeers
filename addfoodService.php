<?php 
  include 'connectdb.php';
    $userId = $_GET['userid'];

    $sql = "SELECT * FROM `users` WHERE `userid`='$userId'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];

    if(isset($_POST['submit'])){
        $serviceName = $_POST['serviceName'];
        $fbLink = $_POST['fbLink']=="" ? "N/A" : $_POST['fbLink'];
        $siteLink = $_POST['siteLink']=="" ? "N/A" : $_POST['siteLink'];
        $phnNum = $_POST['phnNum'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $isStudent = $_POST['isStudent']== "yes" ? 1 : 0;
        $cDescription = $_POST['cDescription'];
        $foodType = implode(", ",$_POST['foodType']);


        $brandLogo = $_FILES['brandLogo']['name'];
        $tempname = $_FILES['brandLogo']['tmp_name'];
        $folder = "foodServiceLogo/".$brandLogo;
        move_uploaded_file($tempname, $folder);


        $sql = "INSERT INTO `foodServices`(`service_name`, `fb_page`, `site_link`, `phone_num`, `start_time`, `end_time`,`order_condition`,`foodType`,`logo`, `isStudent`, `description`,`assigned_by`) VALUES ('$serviceName','$fbLink', '$siteLink','$phnNum','$startTime','$endTime','','$foodType','$folder','$isStudent','$cDescription','$userId')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:foodServices.php?userid='.$userId.'');
            
            echo "<script>alert('Service Added Successfully');</script>";
        }
        else{
            echo "<script>alert('Error');</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>FooD Services</title>
</head>

<body>

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
                            href="index1.php?userid=<?php echo $userId?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="bookdisplay.php?userid=<?php echo $userId?>">Book Exchange</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="coursereview.php?userid=<?php echo $userId?>">Course Review</a>
                    </li>

                    <li class="nav-item" id="faculty_rating">
                        <a class="nav-link" href="facultyRating.php?userid=<?php echo $userId?>">Faculty Rating</a>
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


    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">ADD Service</p>
                        <!-- Course name -->
                        <div class="form-outline mb-4">
                            <label for="service_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="service_name" name="serviceName">
                        </div>

                        <hr>

                        <!-- Facebook Page-->
                        <div class="form-outline mb-4">
                            <label for="">Do you take order through Facebook?</label>
                            <br>
                            <input type="radio" id="yes" name="fbOrder" value="yes">
                            <label for="yes">Yes</label><br>
                            <input type="radio" id="no" name="fbOrder" value="no">
                            <label for="no">No</label><br>
                        </div>

                        <div class="form-outline mb-4" id="order_fb">
                            <label for="fb_page_link" class="form-label">FaceBook Page Link</label>
                            <input type="url" class="form-control" id="fb_page_link" name="fbLink">
                        </div>



                        <div class="form-outline mb-4">
                            <label for="">Do you take order through website?</label>
                            <br>
                            <input type="radio" id="yes" name="siteOrder" value="yes">
                            <label for="yes">Yes</label><br>
                            <input type="radio" id="no" name="siteOrder" value="no">
                            <label for="no">No</label><br>
                        </div>

                        <div class="form-outline mb-4" id="order_site">
                            <label for="site_link" class="form-label">Website Link</label>
                            <input type="url" class="form-control" id="site_link" name="siteLink">
                        </div>



                        <hr>

                        <!-- Phone Number -->
                        <div class="form-outline mb-4">
                            <label for="phn_num" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phn_num" name="phnNum">
                        </div>

                        <!-- order Condition -->
                        <div class="form-outline mb-4">
                            <label for="order_condition" class="form-label">Any Order Condition?</label>
                            <input type="text" class="form-control" id="order_condition" name="orderCondition">
                        </div>

                        <hr>

                        <!-- Opening time -->
                        <div class="form-outline mb-4 ">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="start_time">Opening Time</label>
                                    <input type="time" name="startTime" id="start_time">
                                </div>
                                <div class="col-md-4"></div>

                                <!-- Closing time -->
                                <div class="col-md-4">
                                    <label for="end_time">Closing Time</label>
                                    <input type="time" name="endTime" id="end_time">
                                </div>
                            </div>
                        </div>

                        <!-- foodType -->
                        <div class="form-outline mb-4">
                            <label class="form-label">FoodType</label>
                            <br>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="breakfast" name="foodType[]"
                                    value="breakfast">
                                <label class="btn btn-outline-primary" for="breakfast">Breakfast</label><br>
                                <input type="checkbox" class="btn-check" id="lunch" name="foodType[]" value="lunch">
                                <label class="btn btn-outline-primary" for="lunch">Lunch</label><br>
                                <input type="checkbox" class="btn-check" id="dinner" name="foodType[]" value="dinner">
                                <label class="btn btn-outline-primary" for="dinner">Dinner</label><br>
                                <input type="checkbox" class="btn-check" id="snacks" name="foodType[]" value="snacks">
                                <label class="btn btn-outline-primary" for="snacks">Snacks</label><br>
                            </div>

                        </div>

                        <hr>

                        <!-- is uiu student -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Maintained by UIU student?</label>
                            <br>
                            <input type="radio" id="yes" name="isStudent" value="yes">
                            <label for="yes">Yes</label><br>
                            <input type="radio" id="no" name="isStudent" value="no">
                            <label for="no">No</label><br>
                        </div>

                        <!-- Description -->
                        <div class="form-floating">
                            <label for="floatingTextarea2">Description</label>
                            <textarea class="form-control" placeholder="Leave course description here" id="description"
                                name="cDescription" style="height: 100px"></textarea>
                        </div>

                        <hr>

                        <!-- Upload logo -->
                        <div class="form-outline mb-4">
                            <label for="brand_logo" class="form-label">Upload Logo</label>
                            <input class="form-control" type="file" id="brand_logo" name="brandLogo">
                        </div>






                        <!-- Submit button -->
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3" id="submitbtn"
                                style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
    let orderFB = document.getElementById("order_fb");
    let orderSite = document.getElementById("order_site");

    orderFB.style.display = "none";
    orderSite.style.display = "none";

    let fbOrder = document.getElementsByName("fbOrder");
    let siteOrder = document.getElementsByName("siteOrder");

    fbOrder.forEach((item) => {
        item.addEventListener("click", () => {
            if (item.value == "yes") {
                orderFB.style.display = "block";
            } else {
                orderFB.style.display = "none";
            }
        })
    })

    siteOrder.forEach((item) => {
        item.addEventListener("click", () => {
            if (item.value == "yes") {
                orderSite.style.display = "block";
            } else {
                orderSite.style.display = "none";
            }
        })
    })

    let  submitbtn = document.getElementById("submitbtn");
    submitbtn.addEventListener("click", () => {
        let fbLink = document.getElementById("fb_page_link").value;
        let siteLink = document.getElementById("site_link").value;
        let phnNum = document.getElementById("phn_num").value;
        let startTime = document.getElementById("start_time").value;
        let endTime = document.getElementById("end_time").value;
        let isStudent = document.getElementsByName("isStudent");
        let cDescription = document.getElementById("description").value;
        let brandLogo = document.getElementById("brand_logo").value;

        if (phnNum == "") {
            alert("Please fill up the form");
            return false;
        } else if (startTime == "") {
            alert("Please fill up the form");
            return false;
        } else if (endTime == "") {
            alert("Please fill up the form");
            return false;
        } else if (brandLogo == "") {
            alert("Please fill up the form");
            return false;
        } else if (cDescription == "") {
            alert("Please fill up the form");
            return false;
        } else {
            return true;
        }
    })
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>