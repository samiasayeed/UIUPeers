<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $sql = "SELECT * FROM `users` WHERE `userid`='$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $address = $_POST['locAddress'];
        $seatCount = $_POST['seatCount'];
        $rentCharge = $_POST['rentCharge'];
        $otherCharge = $_POST['otherCharge'];
        $availableFrom = $_POST['availableFrom'];
        $lattitude = $_POST['lattitude'];
        $longitude = $_POST['longitude'];
        $phnNum = $_POST['phnNo'];

        $sql = "INSERT INTO `seat_entry` (`title`,`loc_address`, `seat_count`, `rent`, `other_charge`, `av_from`, `lat`, `lng`, `entry_by`, `phone_no`) VALUES ('$title','$address', '$seatCount', '$rentCharge', '$otherCharge', '$availableFrom', '$lattitude', '$longitude', '$userId', '$phnNum')";

        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Data inserted successfully";
            header("Location: accommodation.php?userid=$userId");
        }else{
            echo "Data insertion failed";
        }

        // get the entry id
        $sql = "SELECT * FROM `seat_entry` WHERE `entry_by`='$userId' ORDER BY `entryid` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $entryId = $row['entryid'];

        // upload all images
        $allowed = array('jpg', 'jpeg', 'png');
        $totalFiles = count($_FILES['seat_img']['name']);
        $filesArray = array();

        for($i = 0; $i < $totalFiles; $i++){
            $image_name = $_FILES['seat_img']['name'][$i];
            $image_tmp_name = $_FILES['seat_img']['tmp_name'][$i];

            $image_extension = explode('.', $image_name);
            $image_extension = strtolower(end($image_extension));

            $new_image_name = uniqid('', true).'.'.$image_extension;

            if(move_uploaded_file($image_tmp_name, "accomm_imgs/".$new_image_name)){
                $sql = "INSERT INTO `seat_image` (`seat_id`, `img_link`) VALUES ('$entryId', '$new_image_name')";
                $result = mysqli_query($conn, $sql);
            }
            if(!$result){
                echo "Image upload failed";
            }

        }
        


        mysqli_close($conn);
    }

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
        height: 60%;
        border: 1px solid blue;
    }

    #data,
    #allData {
        display: none;
    }
    </style>
    <title>Add Seat-UIUPeers</title>
</head>

<body>



    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-8 col-xl-8 offset-xl-1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">ADD Seats</p>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="title">Title:</label>
                            <input class="form-control" type="text" class="form-control" id="title" name="title">

                        </div>
                        <hr>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="loc_address">Location Details:</label>
                            <input class="form-control" type="text" class="form-control" id="loc_address"
                                name="locAddress">
                        </div>
                        <hr>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="seat_Count">No of seats</label>
                            <input class="form-control" type="number" class="form-control" id="seat_Count"
                                name="seatCount">
                        </div>
                        <hr>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="rent_charge">Phone:</label>
                            <input class="form-control" type="number" class="form-control" id="phn_no" name="phnNo">
                        </div>
                        <hr>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="rent_charge">Rent:</label>
                            <input class="form-control" type="number" class="form-control" id="rent_charge"
                                name="rentCharge">
                        </div>
                        <hr>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="other_charge">Other charges</label>
                            <input class="form-control" type="number" class="form-control" id="other_charge"
                                name="otherCharge">
                        </div>
                        <hr>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="available_from">Available From:</label>
                            <input class="form-control" type="date" class="form-control" id="available_from"
                                name="availableFrom">
                        </div>






                        <hr>

                        <!-- Upload img -->
                        <div class="form-outline mb-4">
                            <label for="thumb_img" class="form-label" >Select Thumbnali image</label>
                            <input type="file" class="form-control" id="seat_img" name="seat_img[]" multiple>
                        </div>
                        <hr>

                        <!-- upload multiple images -->
                        <!-- <div class="form-outline mb-4">
                            <label for="multi_img" class="form-label">Add all images</label>
                            <input type="file" class="form-control" id="multi_img" name="multi_img[]" multiple>
                        </div>
                        <hr> -->


                        <!-- select from map -->
                        <div class="form-outline mb-4">
                            <label for="map" class="form-label">Select Location from map</label><br>
                            <!-- Search input -->
                            <div class="d-flex justify-content-between" style="margin:10px;">
                            <div id="data_address">
                                <input type="text" id="search_address" placeholder="Enter address">
                                <button id="searchBtn">Search</button>
                            </div>
                            <div id="geolocator" class="btn btn-outline-danger" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            </div>
                            <!-- Google map -->
                            <div id="map"></div>

                            <!-- search by address -->
                            <div id="data_address">
                                <input type="text" id="lattitude" name="lattitude" hidden>
                                <input type="text" id="longitude" name="longitude" hidden>

                            </div>

                        </div>

                        <br><br><br>



                        <!-- Submit button -->
                        <div class="d-flex justify-content-center mx-5 mb-3 mb-lg-4 ">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3" id="submitbtn"
                                style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">ADD</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>










</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD97DZkySj9Q0W_h43Vl-YNJpNITNy-dkQ&callback=loadMap&v=weekly">
</script>

<script>
let latbox = document.getElementById('lattitude');
let longbox = document.getElementById('longitude');
var longLat = {
    lat: 23.8103,
    lng: 90.4125

};

var geolocator = document.getElementById('geolocator');
geolocator.addEventListener('click', function() {
    getLocation();
    loadMap();
});

window.onload = function() {
    loadMap();
    getLocation();
}



function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, handleLocationError);
    }

}

function showPosition(position) {
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    longLat = {
        lat: lat,
        lng: long
    };
    latbox.value = lat;
    longbox.value = long;
    // alert('Latitude: ' + lat + '\nLongitude: ' + long);
}

function handleLocationError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            // console.log("You denied the request for your location.");
            alert("You denied the request for your location.");
            location.reload();
            break;

    }
}


function loadMap() {

    latbox.value = longLat.lat;
    longbox.value = longLat.lng;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: longLat
    });
    var marker = new google.maps.Marker({
        position: longLat,
        map: map,
        draggable: true
    });
    google.maps.event.addListener(marker, 'dragend', function() {
        var latLng = marker.getPosition();
        longLat = {
            lat: latLng.lat(),
            lng: latLng.lng()
        };
        latbox.value = latLng.lat();
        longbox.value = latLng.lng();
        // alert('Latitude: ' + latLng.lat() + '\nLongitude: ' + latLng.lng());
    });

    searchAddress();

    const infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });


    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation ?
            "Error: The Geolocation service failed." :
            "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }


}

function searchAddress() {
    var searchInput = document.getElementById('search_address');
    var searchBtn = document.getElementById('searchBtn');
    var autocomplete = new google.maps.places.Autocomplete(searchInput, {
        types: ['geocode']
    }, {
        componentRestrictions: {
            'country': ['bd']
        }
    });

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();

        lat: place.geometry.location.lat();
        lng: place.geometry.location.lng();

        longLat = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng()
        };


    });

    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        loadMap();

        latbox.value = place.geometry.location.lat();
        longbox.value = place.geometry.location.lng();
    });

}
</script>
<!-- google place api -->
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD97DZkySj9Q0W_h43Vl-YNJpNITNy-dkQ&libraries=places&callback=loadMap">
</script>

</html>