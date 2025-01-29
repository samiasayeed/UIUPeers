<?php
include 'connectdb.php';
  $userId = $_GET['userid'];
  

  $sql = "SELECT * FROM `users` WHERE `userid`='$userId'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  $name = $row['username'];
  $job = $row['job'];
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

    <title>Home</title>
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
                    <!-- <li class="nav-item">
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
                    <li class="nav-item">
                        <a class="nav-link" href="foodServices.php?userid=<?php echo $userId?>">Food Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accommodation.php?userid=<?php echo $userId?>">Accommodation</a>
                    </li> -->

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
    <!-- navbar end -->



    <div class="container " style="display:flex-box;">
        <div class="container">
            <div class="row ">
                <div class="col-md-12" style="margin: 10px 0 10 80">
                    <div class="row">
                        <div class="col-md-6" style="padding: 100px 0px 0px 100px;">
                            <div class="card  mb-3" style="max-width: 18rem;
                        align-items: center;
                         height: 150px;
                        float: none;
                        background-color: #f38b23;
                        ">
                                <!-- <div class="card-header">Users</div> -->
                                <div class="card-body d-flex align-items-center">
                                    <a href="coursereview.php?userid=<?php echo $userId?>"
                                        style="text-decoration:none; color: black;">
                                        <h5 class="card-title " style="text-align: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60"
                                                viewBox="0 0 640 512">
                                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path
                                                    d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2 0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.3-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9l0 0 0 0-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z" />
                                            </svg>
                                            <p style="font-size: 1.5rem; font-weight: bold;">
                                                COURSE REVIEW </p>
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6" style="padding: 100px 50px 0 0;">
                            <div class="card  mb-3" style="max-width: 18rem;
                         align-items: center;
                         height: 150px;
                        float: none;
                        background-color: #f38b23;
                        ">
                                <!-- <div class="card-header">Users</div> -->
                                <div class="card-body d-flex align-items-center">
                                    <a href="bookdisplay.php?userid=<?php echo $userId?>"
                                        style="text-decoration:none; color: black;">
                                        <h5 class="card-title " style="text-align: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                            </svg>
                                            <p style="font-size: 1.5rem; font-weight: bold;">
                                                BOOK EXCHANGE </p>
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="padding: 100px 0 0 100px;">
                                <div class="card  mb-3" style="max-width: 18rem;
                        align-items: center;
                         height: 150px;
                        float: none;
                        background-color: #f38b23;
                        margin-bottom: 10px;">
                                    <!-- <div class="card-header">Users</div> -->
                                    <div class="card-body d-flex align-items-center">
                                        <a href="foodServices.php?userid=<?php echo $userId?>"
                                            style="text-decoration:none; color: black;">
                                            <h5 class="card-title " style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60"
                                                    viewBox="0 0 448 512">
                                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                    <path
                                                        d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                                                </svg>
                                                <p style="font-size: 1.5rem; font-weight: bold;">
                                                    FOOD SERVICE</p>
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6" style="padding: 100px 50 0 11px;">
                                <div class="card  mb-3" style="max-width: 18rem;
                                    align-items: center;
                                          height: 150px;
                                          float: none;
                                          background-color: #f38b23;
                                          ">
                                    <!-- <div class="card-header">Users</div> -->
                                    <div class="card-body d-flex align-items-center">
                                        <a href="accommodation.php?userid=<?php echo $userId?>"
                                            style="text-decoration:none; color: black;">
                                            <h5 class="card-title " style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                    fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                                </svg>
                                                <p style="font-size: 1.5rem; font-weight: bold;">
                                                    ACCOMMODATION </p>
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="faculty_rating">
                            <div class="col-md-6" style="padding: 100px 0 0 100px;">
                                <div class="card  mb-3" style="max-width: 18rem;
                        align-items: center;
                         height: 150px;
                        float: none;
                        background-color: #f38b23;
                        margin-bottom: 10px;">
                                    <!-- <div class="card-header">Users</div> -->
                                    <div class="card-body d-flex align-items-center">
                                        <a href="facultyRating.php?userid=<?php echo $userId?>"
                                            style="text-decoration:none; color: black;">
                                            <h5 class="card-title " style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60"
                                                    viewBox="0 0 640 512">
                                                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                    <path
                                                        d="M160 64c0-35.3 28.7-64 64-64H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H336.8c-11.8-25.5-29.9-47.5-52.4-64H384V320c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v32h64V64L224 64v49.1C205.2 102.2 183.3 96 160 96V64zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352h53.3C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7H26.7C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z" />
                                                </svg>
                                                <p style="font-size: 1.5rem; font-weight: bold;">
                                                    FACULTY RATING</p>
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <script>
                    let faculty_or_student = "<?php echo $job ?>";
                    if (faculty_or_student == "F") {
                        document.querySelectorAll("#faculty_rating").forEach((e) => e.style.display = "none");
                    }
                    </script>

                    <!-- Bootstrap -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                        crossorigin="anonymous"></script>

</body>

</html>