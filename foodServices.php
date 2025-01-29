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
                        <a class="nav-link" aria-current="page" href="index1.php?userid=<?php echo $userId?>">Home</a>
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
                        <a class="nav-link active" href="foodServices.php?userid=<?php echo $userId?>">Food Services</a>
                    </li>

                    <li class="nav-item">
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


    <div class="container-fluid">



        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">

                        <table class="table d-flex justify-content-center">
                            <thead>


                                <h3>
                                    <center>Food Services</center>
                                </h3>

                            </thead>
                            <tbody>

                                <?php 
                                $sql = "SELECT * FROM `foodServices`";
                                $result = mysqli_query($conn, $sql);

                                while($row2 = mysqli_fetch_assoc($result)){
                                    $foodId = $row2['service_id'];
                                    $foodName = $row2['service_name'];
                                    $logo = $row2['logo'];
                                    $foodType = $row2['foodType'];
                                    $start_time = date('h:i A', strtotime($row2['start_time']));
                                    $end_time = date('h:i A', strtotime($row2['end_time']));
                                    $fb_page = $row2['fb_page']=="N/A"?"#":$row2['fb_page'];
                                    $site_link = $row2['site_link']=="N/A"?"#":$row2['site_link'];
                                    $phone_num = $row2['phone_num'];
                                    $isStudent = $row2['isStudent'];
                                    $description = $row2['description'];
                                    $assigned_by = $row2['assigned_by'];

                                    $sql2 = "SELECT AVG(quality) as quality,
                                    AVG(pricing) as price,
                                    AVG(delivery_time) as delivery
                                     FROM `food_s_review` WHERE `service_id`='$foodId'";

                                    $result2 = mysqli_query($conn, $sql2);
                                    $row3 = mysqli_fetch_assoc($result2);

                                    $quality = $row3['quality'];
                                    $price = $row3['price'];
                                    $delivery = $row3['delivery'];

                                    $rating = round(($quality + $price + $delivery)/3,2);
                                    $rating = $rating==0?"N/A":$rating;
                                    echo '<div class="container"> <tr >
                                    <tr >
                                        <td rowspan="2">
                                            <img alt="LOGO" src="'.$logo.'"
                                                class="rounded" width="50px" height="50px" />
                                            '.$foodName.'
                                            <br>
                                            <br>';

                                    if($isStudent == 1){
                                    echo '<footer class="blockquote-footer" id="is_student">
                                        Maintained By <cite>UIU Student</cite>
                                        </footer>';}

                                    echo '</td>
                                        <td>
                                            Rating: '.$rating.'
                                        </td>
                                        <td>
                                            Food type: '.$foodType.'
                                        </td>
                                        <td> ';
                                        $sql3 = "SELECT * FROM `food_s_review` WHERE `service_id`='$foodId' AND `ratedBy`='$userId'";
                                        $result3 = mysqli_query($conn, $sql3);
                                        $row4 = mysqli_fetch_assoc($result3);
                                        if(!$row4){
                                        echo '
                                            Rate this service:
                                            <!-- Service rating -->
                                            <button type="button" class="btn btn-secondary"><a href="addFoodRate.php?userid='.$userId.'&foodid='.$foodId.'" style="color:white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                            <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                            </svg>
                                            </a>
                                            </button>';}
                                            else{
                                                echo '
                                                Remove Your Rating:
                                                <button type="button" class="btn btn-danger"><a href="deleteFoodRate.php?userid='.$userId.'&foodid='.$foodId.'" style="color:white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                                <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                                </svg>
                                                </a>
                                                </button>';
                                            }
                                        echo '
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Active Time: '.$start_time.' - '.$end_time.'
                                        </td>
                                        <td>
                                            Order Contact:  <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary">
                                            <a href="tel:'.$phone_num.'" style="color:white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                                          </svg></a>
                                          </button>
                                            <button type="button" class="btn btn-secondary">
                                            <a href="'.$fb_page.'" style="color:white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                          </svg></a>
                                          </button>
                                            <button type="button" class="btn btn-secondary">
                                            <a href="'.$site_link.'" style="color:white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                                          </svg></a>
                                          </button>
                                            </div>
    
                                        </td>
                                        <td>'; 
                                        if($assigned_by == $userId){
                                            echo 'Opertation:
                                            <button type="button" class="btn btn-secondary"><a href="deletefood.php?userid='.$userId.'&foodid='.$foodId.'" style="color:white; text-decoration:none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                            </a></button>
                                            ';
                                        }

                                        echo '</td>
                                        </td>
    
                                    </tr>
    
                                    </tr>
                                    
                                    </div>
                                    
                                    ';
                                }
                            ?>



                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">

                            <button type="button" class="btn btn-success" id="review_btn"><a
                                    href="addfoodService.php?userid=<?php echo $userId ?>"
                                    style="color:white;text-decoration:none;">Add a Service</a></button>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    <?php 
        if($assigned_by == $userId){
            echo 'document.getElementById("review_btn").style.display = "none";';
        }
    ?>
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    <!-- Check faculty or student -->
    <script>
    let faculty_or_student = "<?php echo $job ?>";
    if (faculty_or_student == "F") {
        document.querySelectorAll("#faculty_rating").forEach((e) => e.style.display = "none");
    }
    </script>

</body>

</html>