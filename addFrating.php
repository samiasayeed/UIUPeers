<?php
    include 'connectdb.php';

    $f_id = $_GET['rateid'];
    $userId = $_GET['userid'];
    $sql = "SELECT * FROM `faculty` WHERE `faculty_id` = '$f_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['f_name'];
    $designation = $row['f_position'];

    if(isset($_POST['submit'])){
        $teachingMethod = $_POST['teachingMethod'];
        $communication = $_POST['communication'];
        $counselling = $_POST['counselling'];
        $supportive = $_POST['supportive'];
        $feedback = $_POST['feedback'];
        $marking = $_POST['marking'];

        $sql = "INSERT INTO `facultyReview` (`faculty_id`, `teaching_method`, `communication_skill`, `availability`, `supportive`, `take_feedback`,`marking`, `rated_by`) 
        VALUES ('$f_id', '$teachingMethod', '$communication', '$counselling', '$supportive', '$feedback','$marking','$userId')";
        $result = mysqli_query($conn, $sql);
        if($result){
          header("Location: facultyRating.php?userid=$userId");
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            echo "<script>window.location.href='faculty.php'</script>";
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
    <title>addFaculty</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Give Ratings</p>
                        <!-- Faculty name -->
                        <div class="form-outline mb-4">
                            <label for="faculty_name" class="form-label">Faculty name</label>
                            <input type="text" class="form-control" id="faculty_name" name="facultyName"
                                value="<?php echo $name?>" disabled>
                        </div>

                        <!-- Email -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="faculty_mail">
                                Designation</label>
                            <input type="text" id="faculty_mail" class="form-control" name="facultyMail"
                                value="<?php echo $designation?>" disabled>
                        </div>

                        <hr>
                        <!-- Teaching Method -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> How likely you recommend his Teaching Method?</h6>
                            <span>(Rate out of 5)</span></label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="teaching_method" name="teachingMethod" value="1">
                                    <br><label for="teaching_method">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="teaching_method" name="teachingMethod" value="2">
                                    <br><label for="teaching_method">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="teaching_method" name="teachingMethod" value="3">
                                    <br><label for="teaching_method">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="teaching_method" name="teachingMethod" value="4">
                                    <br><label for="teaching_method">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="teaching_method" name="teachingMethod" value="5">
                                    <br><label for="teaching_method">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning1" style="display: none;">
                                <span style="color: red">*Required</span>
                            </div>
                        </div>

                        <hr>

                        <!-- Communication Skill -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> How much do you like his Communication Skill?</h6>(Rate
                            out of 5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="communication_skill" name="communication" value="1">
                                    <br><label for="communication_skill">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="communication_skill" name="communication" value="2">
                                    <br><label for="communication_skill">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="communication_skill" name="communication" value="3">
                                    <br><label for="communication_skill">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="communication_skill" name="communication" value="4">
                                    <br><label for="communication_skill">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="communication_skill" name="communication" value="5">
                                    <br><label for="communication_skill">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning2" style="display: none;">
                                <span style="color: red">*Required</span>

                            </div>

                        </div>

                        <hr>

                        <!-- Enough Counselling -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> Does he/she gives students enough time in Counselling?
                            </h6>(Rate out of 5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="Counselling" name="counselling" value="1">
                                    <br><label for="Counselling">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Counselling" name="counselling" value="2">
                                    <br><label for="Counselling">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Counselling" name="counselling" value="3">
                                    <br><label for="Counselling">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Counselling" name="counselling" value="4">
                                    <br><label for="Counselling">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Counselling" name="counselling" value="5">
                                    <br><label for="Counselling">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning3" style="display: none;">
                                <span style="color: red">*Required</span>

                            </div>

                        </div>

                        <hr>
                        <!-- Marking -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> Do you think he/she is fair in marking?
                            </h6>(Rate out of 5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="marking" name="marking" value="1">
                                    <br><label for="marking">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="marking" name="marking" value="2">
                                    <br><label for="marking">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="marking" name="marking" value="3">
                                    <br><label for="marking">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="marking" name="marking" value="4">
                                    <br><label for="marking">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="marking" name="marking" value="5">
                                    <br><label for="marking">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning3" style="display: none;">
                                <span style="color: red">*Required</span>

                            </div>

                        </div>

                        <hr>

                        <!-- Supportive -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> Overall do you find him/her Supportive?</h6>(Rate out of
                            5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="Supportive" name="supportive" value="1">
                                    <br><label for="Supportive">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Supportive" name="supportive" value="2">
                                    <br><label for="Supportive">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Supportive" name="supportive" value="3">
                                    <br><label for="Supportive">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Supportive" name="supportive" value="4">
                                    <br><label for="Supportive">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Supportive" name="supportive" value="5">
                                    <br><label for="Supportive">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning4" style="display: none;">
                                <span style="color: red">*Required</span>

                            </div>

                        </div>


                        <hr>

                        <!-- Feedback -->
                        <div class="form-outline mb-4">
                            <h6><i class="bi bi-star-fill"></i> How likely he or she is to take Feedback on your
                                understanding on the course?</h6>(Rate out of 5)</label>
                            <!-- input radio out of 5 -->
                            <div class="container d-flex">

                                <div class="container  flex-column">
                                    <input type="radio" id="Feedback" name="feedback" value="1">
                                    <br><label for="Feedback">1</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Feedback" name="feedback" value="2">
                                    <br><label for="Feedback">2</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Feedback" name="feedback" value="3">
                                    <br><label for="Feedback">3</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Feedback" name="feedback" value="4">
                                    <br><label for="Feedback">4</label>
                                </div>
                                <div class="container flex-column">
                                    <input type="radio" id="Feedback" name="feedback" value="5">
                                    <br><label for="Feedback">5</label>
                                </div>

                            </div>
                            <!-- Warning -->
                            <div class="form-text mb-4" id="warning5" style="display: none;">
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
        var teachingMethod = document.getElementsByName("teachingMethod");
        var communication = document.getElementsByName("communication");
        var counselling = document.getElementsByName("counselling");
        var supportive = document.getElementsByName("supportive");
        var feedback = document.getElementsByName("feedback");
        var marking = document.getElementsByName("marking");

        var isChecked = false;
        for (var i = 0; i < teachingMethod.length; i++) {
            if (teachingMethod[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate Teaching Method");
            return false;
        }

        var isChecked = false;
        for (var i = 0; i < communication.length; i++) {
            if (communication[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate Communication Skill");
            return false;
        }

        var isChecked = false;
        for (var i = 0; i < counselling.length; i++) {
            if (counselling[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate Counselling");
            return false;
        }

        var isChecked = false;
        for (var i = 0; i < supportive.length; i++) {
            if (supportive[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate Supportive");
            return false;
        }

        var isChecked = false;
        for (var i = 0; i < feedback.length; i++) {
            if (feedback[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate Feedback");
            return false;
        }

        var isChecked = false;
        for (var i = 0; i < marking.length; i++) {
            if (marking[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Please rate Marking");
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