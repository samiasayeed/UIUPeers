<?php
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $sql = "SELECT * FROM `users` WHERE userid = '$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
    
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel-UIUPeers</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <!-- admin panel -->
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
                                <a href="userList.php?userid=<?php echo $userId?>"
                                    style="text-decoration:none; color: black;">
                                    <h5 class="card-title " style="text-align: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>
                                        <p style="font-size: 1.5rem; font-weight: bold;">
                                            USERS </p>
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
                            <a href="A_courseList.php?userid=<?php echo $userId ?>"
                                    style="text-decoration:none; color: black;">
                                    <h5 class="card-title " style="text-align: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                            fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                            <path
                                                d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                        </svg>
                                        <p style="font-size: 1.5rem; font-weight: bold;">
                                            Courses </p>
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
                                <a href="facultyList.php?userid=<?php echo $userId?>"
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
                </div>
            </div>

           
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous">
            </script>
</body>

</html>