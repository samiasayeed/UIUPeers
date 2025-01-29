<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];
    $sql = "SELECT username  FROM `users`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Control-UIUPeers</title>
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
                </ul>

            </div>
        </div>
    </nav>
    <!-- navbar -->


    <br>
    <div class="container">
        <!-- <button type="button" class="btn btn-outline-primary"><a href="addbooks.php">Add Book</a></button> -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Phone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Type</th>
                    <th scope="col">UIU ID</th>
                    <th scope="col">Card</th>
                    <th scope="col">Department</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
    include 'connectdb.php';
    $sql = "SELECT userid,username,phone,email,job,university_id,department,id_card_img,approve  FROM `users`";
    $result = mysqli_query($conn, $sql);
    if($result){
      $serial = 1;
        while($row = mysqli_fetch_assoc($result)){
                
                $id = $row['userid'];
                $name = $row['username'];
                $phone = $row['phone'];
                $email = $row['email'];
                $type = $row['job'];
                $uiu = $row['university_id'];
                $dept = $row['department'];
                $card = $row['id_card_img'];
                $approve = $row['approve'];
    
                echo '<tr>
                <th scope="row">'.$serial.'</th>
                <td>'.$name.'</td>
                <td>'.$phone.'</td>
                <td>'.$email.'</td>
                <td>'.$type.'</td>
                <td>'.$uiu.'</td>
                <td>
                <img src="idImages/'.$card.'" class="id_img" width="80" height="80">

                
                </td>
                <td>'.$dept.'</td>
                <td>
                <a class="btn btn-primary" href="updateUser.php?updateid='.$id.'&userid='.$userId.'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
                </a>
                <a class="btn btn-danger" href="deleteUser.php?deleteId='.$id.'&userid='.$userId.'">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                </svg>
                </a> ';
                if($approve == 0){
                    echo '<a class="btn btn-success" href="approveUser.php?approveId='.$id.'&userid='.$userId.'" style="color:white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </svg>';
                }
                else{
                    echo '<a class="btn btn-secondary" href="approveUser.php?approveId='.$id.'&userid='.$userId.'" style="color:white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                  </svg>';
                }
                echo '
                
                </a>
                </td>

                </tr>
                



                ';
                $serial++;


        }

    }
    else{
        echo "No result found";
    }


    ?>
            </tbody>
        </table>
    </div>



                    <!-- Image Modal -->
                    <div class="modal fade" id="imgmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img src="" class="model-img" width="100%" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Image Modal End -->
</body>
<script>
    document.addEventListener("click", function (event) {
        if (event.target.matches(".id_img")) {
            const src = event.target.getAttribute("src");
            console.log(src);
            document.querySelector(".model-img").src = src;
            document.querySelector(".modal-title").innerHTML = "ID Card";
            var myModal = new bootstrap.Modal(document.getElementById('imgmodal'));
            
            myModal.show();
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</html>