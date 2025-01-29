<?php
    include 'connectdb.php';

    $userId = $_GET['userid'];
    $foodId = $_GET['foodid'];

    $sql = "SELECT * FROM `foodServices` WHERE `service_id` = '$foodId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['service_name'];

    if(isset($_POST['submit'])){
        $foodQuality = $_POST['foodQuality'];
        $foodPricing = $_POST['foodPricing'];
        $deliveryTime = $_POST['deliveryTime'];
        $rated_by = $userId;

        $sql = "INSERT INTO `food_s_review` (`ratedBy`,`service_id`, `quality`, `pricing`, `delivery_time`) VALUES ('$userId', '$foodId', '$foodQuality', '$foodPricing', '$deliveryTime')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script>alert('Thank you for your feedback!'); window.location.href='foodServices.php?userid=$userId';</script>";
        }
        else{
            echo "<script>alert('Something went wrong!'); window.location.href='foodServices.php?userid=$userId';</script>";
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
    <title>Food rating</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Give Ratings</p>
                        <!-- name -->
                        <div class="form-outline mb-4">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" name="serviceName"
                                value="<?php echo $name?>" disabled>
                        </div>

                        <!-- Email
                        <div class="form-outline mb-4">
                            <label class="form-label" for="faculty_mail">
                                Designation</label>
                            <input type="text" id="faculty_mail" class="form-control" name="facultyMail"
                                value="" disabled>
                        </div> -->

                        <hr>
                        <!-- quality -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> How satisfied were you with the taste and quality of the food</h6>
                            <span>(Rate out of 5)</span></label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="food_quality" name="foodQuality" value="1">
                                    <br><label for="food_quality">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_quality" name="foodQuality" value="2">
                                    <br><label for="food_quality">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_quality" name="foodQuality" value="3">
                                    <br><label for="food_quality">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_quality" name="foodQuality" value="4">
                                    <br><label for="food_quality">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_quality" name="foodQuality" value="5">
                                    <br><label for="food_quality">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning1" style="display: none;">
                                <span style="color: red">*Required</span>
                            </div>
                        </div>

                        <hr>

                        <!-- Pricing -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> Did you feel that the prices were justified by the quality and quantity of the food?</h6>(Rate
                            out of 5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="food_pricing" name="foodPricing" value="1">
                                    <br><label for="food_pricing">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_pricing" name="foodPricing" value="2">
                                    <br><label for="food_pricing">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_pricing" name="foodPricing" value="3">
                                    <br><label for="food_pricing">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_pricing" name="foodPricing" value="4">
                                    <br><label for="food_pricing">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="food_pricing" name="foodPricing" value="5">
                                    <br><label for="food_pricing">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning2" style="display: none;">
                                <span style="color: red">*Required</span>

                            </div>

                        </div>

                        <hr>

                        <!-- delivery time -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> Were the waiting times for food delivery reasonable?
                            </h6>(Rate out of 5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="delivery_time" name="deliveryTime" value="1">
                                    <br><label for="delivery_time">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="delivery_time" name="deliveryTime" value="2">
                                    <br><label for="delivery_time">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="delivery_time" name="deliveryTime" value="3">
                                    <br><label for="delivery_time">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="delivery_time" name="deliveryTime" value="4">
                                    <br><label for="delivery_time">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="delivery_time" name="deliveryTime" value="5">
                                    <br><label for="delivery_time">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning3" style="display: none;">
                                <span style="color: red">*Required</span>

                            </div>

                        </div>





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
    function validate() {
        var foodQuality = document.getElementsById("food_quality");
        var foodPricing = document.getElementsById("food_pricing");
        var deliveryTime = document.getElementsById("delivery_time");

        isChecked = false;
        for (var i = 0; i < foodQuality.length; i++) {
            if (foodQuality[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate the 1st field");
            return false;
        }

        isChecked = false;
        for (var i = 0; i < foodPricing.length; i++) {
            if (foodPricing[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate the 2nd field");
            return false;
        }

        isChecked = false;
        for (var i = 0; i < deliveryTime.length; i++) {
            if (deliveryTime[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate the 3rd field");
            return false;
        }


        return true;
    }


    document.getElementById("submitbtn").addEventListener("click", function() {
        if (!validate()) {
            alert("Please rate all the fields");
        }
    });

    </script>
</body>

</html>