<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $entryid = $_GET['entryid'];
    $sql = "SELECT * FROM `users` WHERE `userid`='$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];

    $sql = "SELECT * FROM `seat_entry` WHERE `entryid`='$entryid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $location_address = $row['loc_address'];
    $seat_count = $row['seat_count'];
    $rent = $row['rent'];
    $other_charge = $row['other_charge'];
    $available_from = $row['av_from'];
    $latitude = $row['lat'];
    $longitude = $row['lng'];
    $phone = $row['phone_no'];
    $entryBy = $row['entry_by'];


   

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


    <style type="text/css">
    .container {
        height: 450px;
    }

    #map {
        width: 100%;
        height: 500px;
        border: 1px solid blue;
    }

    #data,
    #allData {
        display: none;
    }
    </style>
    <title>Seat Details-UIUPeers</title>
</head>

<body>

    <div class="container">
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <?php 
                        $sql = "SELECT * FROM `seat_entry` WHERE `entryid`='$entryid'";
                        $result = mysqli_query($conn, $sql);
                        $row1 = mysqli_fetch_assoc($result);
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

                ?>
                <h2 class="featurette-heading"><?php echo $title ?><span class="text-muted"></h2>
                <p class="lead"><span style="font-weight:Bold;">Location:</span> <?php echo $location_address ?></p>
                <p class="lead"><span style="font-weight:Bold;">Available Seat:</span> <?php echo $seat_count ?></p>
                <p class="lead"><span style="font-weight:Bold;">Rent:</span> <?php echo $rent ?></p>
                <p class="lead"><span style="font-weight:Bold;">Other Charges:</span> <?php echo $other_charge ?></p>
                <p class="lead"><span style="font-weight:Bold;">Available From:</span> <?php echo $available_from ?></p>
                <p class="lead"><span style="font-weight:Bold;">Phone:</span> <?php echo $phone ?></p>

            </div>
            <div class="col-md-5 order-md-1">

                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php 
        $sql = "SELECT * FROM `seat_image` WHERE `seat_id`='$entryid'";
        $result = mysqli_query($conn, $sql);
        $active = 1;

        while($row = mysqli_fetch_assoc($result)){
            $image = $row['img_link'];
            
            if($active == 1){
                echo '<div class="carousel-item active">
                <img src="accomm_imgs/'.$image.'" class="d-block w-100" alt="...">
            </div>';
            $active = 0;
            }else{
                echo '<div class="carousel-item">
                <img src="accomm_imgs/'.$image.'" class="d-block w-100" alt="...">
            </div>';

            }
            
        }
       
        ?>


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
        <hr class="featurette-divider">
        <div class="d-flex justify-content-center">
            <div class="col-md-7 order-md-1">
                <div id="map"></div>
            </div>
        </div>
    </div>










</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD97DZkySj9Q0W_h43Vl-YNJpNITNy-dkQ&callback=loadMap&v=weekly">
</script>

<!-- google map -->
<script>
var map;

function loadMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: <?php echo $latitude ?>,
            lng: <?php echo $longitude ?>
        },
        zoom: 15
    });

    var marker = new google.maps.Marker({
        position: {
            lat: <?php echo $latitude ?>,
            lng: <?php echo $longitude ?>
        },
        map: map,
        title: 'Hello World!'
    });
}
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>