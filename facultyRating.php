<?php
  include 'connectdb.php';

  $userId = $_GET['userid'];
  $sql = "SELECT username,job FROM `users` WHERE `userid`='$userId'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  $name = $row['username'];
  $job = $row['job'];

  if($job == 'F'){
    header("Location: index1.php?userid=$userId");
  }

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Rating-UIUPeers</title>
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
                        <a class="nav-link" href="bookdisplay.php?userid=<?php echo $userId?>">Book Exchange</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="coursereview.php?userid=<?php echo $userId?>">Course Review</a>
                    </li>

                    <li class="nav-item active" id="faculty_rating">
                        <a class="nav-link active" href="facultyRating.php?userid=<?php echo $userId?>">Faculty
                            Rating</a>
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
        <table class="table">
            <thead>
                <div class="row">
                    <div class=" d-flex justify-content-center">
                        <h1>Faculty Ratings</h1>
                    </div>
                </div>
                <hr>
            </thead>
            <tbody class="table-group-divider">

                <?php
    $sql = "SELECT * FROM `faculty`";
    $result = mysqli_query($conn, $sql);

    $serial = 1;
    if($result){
        while($row = mysqli_fetch_assoc($result)){

            $id = $row['faculty_id'];
            $name = $row['f_name'];
            $image = $row['profile_image'];

            $sqlRating = "SELECT AVG(teaching_method), AVG(communication_skill), AVG(availability), AVG(take_feedback),AVG(supportive),AVG(marking) FROM `facultyReview` WHERE `faculty_id` = $id";
            $resultRating = mysqli_query($conn, $sqlRating);
            
              $rowRating = mysqli_fetch_assoc($resultRating);

              $teaching_method = $rowRating['AVG(teaching_method)'];
              $communication = $rowRating['AVG(communication_skill)'];
              $availability = $rowRating['AVG(availability)'];
              $take_feedback = $rowRating['AVG(take_feedback)'];
              $supportive = $rowRating['AVG(supportive)'];
              $marking = $rowRating['AVG(marking)'];

              $teaching_method = round($teaching_method, 2);
                $communication = round($communication, 2);
                $availability = round($availability, 2);
                $take_feedback = round($take_feedback, 2);
                $supportive = round($supportive, 2);
                $marking = round($marking, 2);
                

              $rating = ($teaching_method + $communication + $availability + $take_feedback + $supportive)/5;

              $rating = round($rating, 2);
              $rating = $rating == 0 ? "Unrated" : $rating;
              $teaching_method = $teaching_method == 0 ? "N/A" : $teaching_method;
              $communication = $communication == 0 ? "N/A" : $communication;
              $availability = $availability == 0 ? "N/A" : $availability;
              $take_feedback = $take_feedback == 0 ? "N/A" : $take_feedback;
              $supportive = $supportive == 0 ? "N/A" : $supportive;
              $marking = $marking == 0 ? "N/A" : $marking;


              echo '
              <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-end">
                                <img alt="Bootstrap Image Preview"
                                    src="'.$image.'"  width="100px" height="100px" style="border-radius: 50%;">
                            </div>
                            <div class="col-md-6 d-flex align-items-center ">
                                <div class="flex-column">
                                    <h3>'.$name.'</h3>
                                    <h2>'.$rating.'</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Teaching: '.$teaching_method.'</p>
                                <p>Communication: '.$communication.'</p>
                                <p>Takes Feedback: '.$take_feedback.'</p>

                            </div>
                            <div class="col-md-6">
                                <p>Supportive: '.$supportive.'</p>
                                <p>Marking: '.$marking.'</p>';
                                $sqlReview = "SELECT * FROM (SELECT * FROM `facultyReview` WHERE `rated_by` = $userId) AS t WHERE `faculty_id` = $id";
                                $resultReview = mysqli_query($conn, $sqlReview);
                                $num = mysqli_num_rows($resultReview);

                                if($num > 0){
                                    echo '<button type="button" class="btn btn-outline-primary"><a href="deleteFrating.php?rateid='.$id.'&userid='.$userId.'" style=" text-decoration:none;">DELETE Review</a></button>';
                                }
                                else{
                                    echo '<button type="button" class="btn btn-outline-primary"><a href="addFrating.php?rateid='.$id.'&userid='.$userId.'" style=" text-decoration:none;">Give Review</a></button>';
                                }
                                echo '
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
              ';
            

           
          

        }

      }
      


    ?>
            </tbody>
        </table>
    </div>



        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>







<!-- 
if($rating == 0){
                $rating = "Not Rated Yet";
              }
              


            $sqlReview = "SELECT * FROM (SELECT * FROM `facultyReview` WHERE `rated_by` = $userId) AS t WHERE `faculty_id` = $id";
            $resultReview = mysqli_query($conn, $sqlReview);
            $num = mysqli_num_rows($resultReview);

            if($num > 0){

            echo '
            <tr>
            <tr rowspan="2" ><td><img src="'.$image.'" alt="" width="100px" height="100px" style="border-radius: 50%;"></td>
            <td >
            '.$name.'
            </td>
            <td>Rating: '.$rating.'</td>
            <td ><button type="button" class="btn btn-outline-primary"><a href="deleteFrating.php?rateid='.$id.'&userid='.$userId.'" style=" text-decoration:none;">DELETE Review</a></button></td>
            </tr>
            
            <tr>
            <td></td>
            <td>Teaching Method: '.$teaching_method.'</td>
            <td>Communication Skill: '.$communication.'</td>
            <td>Counseling availability: '.$availability.'</td>
            <td>Take Feedback: '.$take_feedback.'</td>
            <td>Supportive: '.$supportive.'</td>
            </tr>';


            }
            else{
              echo '
              <tr rowspan="2" ><td><img src="'.$image.'" alt="" width="100px" height="100px" style="border-radius: 50%;"></td>
              <td>'.$name.'</td>
              <td>'.$rating.'</td>
              <td ><button type="button" class="btn btn-outline-primary"><a href="addFrating.php?rateid='.$id.'&userid='.$userId.'" style=" text-decoration:none;">Give Review</a></button></td>
              </tr>
              
              <tr>
              <td></td>
              <td>'.$teaching_method.'</td>
              <td>'.$communication.'</td>
              <td>'.$availability.'</td>
              <td>'.$take_feedback.'</td>
              <td>'.$supportive.'</td>
              </tr>';
            
            } -->