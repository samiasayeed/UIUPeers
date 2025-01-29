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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD97DZkySj9Q0W_h43Vl-YNJpNITNy-dkQ"></script> -->


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Accommodation Preview-UIUPeers</title>
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
                            href="index1.php?userid=<?php echo $userId ?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="bookdisplay.php?userid=<?php echo $userId ?>">Book Exchange</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="coursereview.php?userid=<?php echo $userId ?>">Course Review</a>
                    </li>

                    <li class="nav-item" id="faculty_rating">
                        <a class="nav-link" href="facultyRating.php?userid=<?php echo $userId ?>">Faculty Rating</a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link" href="foodServices.php?userid=<?php echo $userId?>">Food Services</a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link active" href="accommodation.php?userid=<?php echo $userId?>">Accommodation</a>
                    </li>


                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <?php echo $name ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">logout</a>
                    </li>
                </ul>

            </div>
    </nav>
    <!-- nav end -->

    <!-- preview cards rowwise -->
    <div class="container">
        <h1 class="text-center">Accommodation Preview</h1>
        <hr>
    </div>
    <div class="container">
        <div class="col-md-12">
            <?php 
$count = 0;
$sql = "SELECT * FROM `seat_entry`";
$result = mysqli_query($conn, $sql);

while($row1 = mysqli_fetch_assoc($result)){
        $entryId = $row1['entryid'];
        $title = $row1['title'];
        $location_address = $row1['loc_address'];
        $seat_count = $row1['seat_count'];
        $rent = $row1['rent'];
        $other_charge = $row1['other_charge'];
        $available_from = $row1['av_from'];
        $latitude = $row1['lat'];
        $longitude = $row1['lng'];
        $phone = $row1['phone_no'];
        $entryBy = $row1['entry_by'];

        // get thumbnail
        $sql2 = "SELECT * FROM `seat_image` WHERE `seat_id`='$entryId' ORDER BY `seat_id` ASC LIMIT 1";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $thumbnail = $row2['img_link'];

    if($count == 0){
        // echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
        echo '<div class="row">';
    }

    echo '
				<div class="col-md-3 ">
					<div class="card bg-default">
						<h5 class="card-header">
							'.$title.'
						</h5>
                        <img src="accomm_imgs/'.$thumbnail.'" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text">

								Location: '.$location_address.'

							</p>
                            <p class="card-text">
                                '.$seat_count.' seats available
                            </p>
						</div>
						<div class="card-footer">
                        <a href="seatDetails.php?userid='.$userId.'&entryid='.$entryId.'" class="btn btn-primary">View Details</a>
							

                            <button type="button" class="btn btn-secondary">
                                <a href="deleteSeat.php?userid='.$userId.'&entryid='.$entryId.'" style="color:white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                </svg></a>
                            </button>
                            
						</div>
					</div>
				</div>

               
				
    ';
    $count++;
    if($count == 4){
        echo '</div>';
        $count = 0;
    }

}

?>
        </div>

    </div>
    <hr>
    <div class="container d-flex justify-content-center">
      
        <button type="button" class="btn btn-primary "><a href="addSeat.php?userid=<?php echo $userId ?>" style="color:white; text-decoration:none;">Add seat</a>
        </button>

        
    </div>




</body>
<script <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script>
    let faculty_or_student = "<?php echo $job ?>";
    if (faculty_or_student == "F") {
        document.querySelectorAll("#faculty_rating").forEach((e) => e.style.display = "none");
    }
    </script>

</html>


<!-- $entryId = $row1['entryid'];
        $location_address = $row1['loc_address'];
        $seat_count = $row1['seat_count'];
        $rent = $row1['rent'];
        $other_charge = $row1['other_charge'];
        $available_from = $row1['av_from'];
        $thumbnail = $row1['thumb_img'];
        $latitude = $row1['lat'];
        $longitude = $row1['lng'];
        $phone = $row1['phone_no'];
        $entryBy = $row1['entry_by']; -->