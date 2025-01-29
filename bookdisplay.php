<?php 
    include 'connectdb.php';
    $userId = $_GET['userid'];

    $sql = "SELECT * FROM `users` WHERE `userid` = '$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
    $job = $row['job'];


    // add book
    if(isset($_POST['addBook'])){
      $bookName = $_POST['bookName'];
      $bookAuthor = $_POST['bookAuthor'];
      $bookDescription = $_POST['bookDescription'];
      $bookPrice = ($_POST['bookprice'])>0 ? $_POST['bookprice'] : 0;
      $bookImages = $_FILES['bookImage']['name'];

      $imagefiletemp = $_FILES['bookImage']['tmp_name'];
      $filename_sepatare = explode('.', $bookImages);
      $fileextention = strtolower(end($filename_sepatare));

      $allowedextention = array('JPG','jpg', 'jpeg', 'png');
      if(in_array($fileextention, $allowedextention)){
          $upload_image = 'bookImages/'.$bookImages;
          move_uploaded_file($imagefiletemp, $upload_image);
      }
      else{
          echo "Please upload jpg, jpeg or png file";
      }
      $currDate = date("Y-m-d");
        $sql = "INSERT INTO `booksdetail` (`title`, `author`, `description`, `price`, `image`, `posted_by`, `postDate`) 
        VALUES ('$bookName', '$bookAuthor', '$bookDescription', '$bookPrice', '$upload_image', '$userId', '$currDate')";
      $result = mysqli_query($conn, $sql);
      if($result == true){
          header('location:bookdisplay.php?userid='.$userId.'');
      }
      else{
          die(mysqli_error($conn));
      }
  }
    // add book end
    
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Exchange-UIUPeers</title>
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
                        <a class="nav-link active" href="bookdisplay.php?userid=<?php echo $userId?>">Book Exchange</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="coursereview.php?userid=<?php echo $userId?>">Course Review</a>
                    </li>

                    <li class="nav-item" id="faculty_rating">
                        <a class="nav-link " href="facultyRating.php?userid=<?php echo $userId?>">Faculty Rating</a>
                    </li>

                    <li class="nav-item" >
                        <a class="nav-link " href="foodServices.php?userid=<?php echo $userId?>">Food Services</a>
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
        <!-- <button type="button" class="btn btn-outline-primary"><a href="addbooks.php?userid=<?php echo $userId?>">Add Book</a></button> -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            ADD BOOK
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Details</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Posted by</th>
                    <th scope="col">Post Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
    $sql = "SELECT * FROM `booksdetail`";
    $result = mysqli_query($conn, $sql);
    if($result){
      $serial = 1;
        while($row2 = mysqli_fetch_assoc($result)){
            // echo var_dump($row);
            $id = $row2['book_id'];
            $name = $row2['title'];
            $Author = $row2['author'];
            $Details = $row2['description'];
            $bookprice = $row2['price']==0?"Exchangeable":$row2['price'];
            $image = $row2['image'];
            $posted_by = $row2['posted_by'];
            $postDate = $row2['postDate'];

            $sql2 = "SELECT username, phone FROM `users` WHERE `userid` = '$posted_by'";
            $result2 = mysqli_query($conn, $sql2);
            $row3 = mysqli_fetch_assoc($result2);
            $posted_by = $row3['username'];
            $phoneNum = $row3['phone'];

            echo '<tr>
            <th scope="row">'.$serial++.'</th>
            <td>'.$name.'</td>
            <td>'.$Author.'</td>
            <td>'.$Details.'</td>
            <td>'.$bookprice.'</td>
            <td><img src="'.$image.'" alt="" width="100px" height="100px"></td>
            <td>'.$posted_by.'<br><a href="tel:'.$phoneNum.'">Call Now</a></td>
            <td>'.$row2['postDate'].'</td>

            <td>

            <a class="btn btn-primary" href="updateBookInfo.php?updateId='.$id.'&userid='.$userId.'">Update</a>
            <a class="btn btn-danger" href="deleteBook.php?deleteId='.$id.'&userid='.$userId.'">Delete</a>
            </td>
        </tr>';
        
        }

    }
    else{
        echo "No result found";
    }


    ?>
            </tbody>
        </table>
    </div>

    <!-- add modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Add Books</p>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form input -->
                    <form action="" method="post" enctype="multipart/form-data">

                        <!-- Book title -->
                        <div class="form-outline mb-4">
                            <label for="book_Name" class="form-label">Book name</label>
                            <input type="text" class="form-control" id="book_Name" name="bookName"">
              </div>

              <!-- Author name -->
              <div class=" form-outline mb-4">
                            <label for="book_author" class="form-label">Book author </label>
                            <input type="text" class="form-control" id="book_author" name="bookAuthor"">
              </div>

              <div class=" form-outline mb-4">
                            <label for="book_description" class="form-label">Book description</label>
                            <input type="text" class="form-control" id="book_description" name="bookDescription"">
              </div>

              <div class=" form-outline mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="on_sell" name="sell_or_exchange"
                                    onclick="sellOrExchange()" />
                                <label class="form-check-label" for="on_sell"> sell </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="on_exchange" name="sell_or_exchange"
                                    onclick="sellOrExchange()" checked />
                                <label class="form-check-label" for="on_exchange">
                                    Exchange
                                </label>
                            </div>
                        </div>

                        <div class="form-outline mb-4" id="price_input" style="display: none">
                            <label for="priceOfBook" class="form-label">Price</label>
                            <input type="text" class="form-control" id="priceOfBook" name="bookprice" />
                        </div>

                        <!-- File upload -->
                        <div class="form-outline mb-4">
                            <label for="book_image" class="form-label">Book image</label>
                            <input type="file" class="form-control" id="book_image" name="bookImage"">
              </div>

              <!-- Submit button -->
              <div class=" d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3"
                                style="width: 100%; border-radius: 30px; font-weight: 600"
                                name="addBook">Submit</button>
                        </div>
                    </form>
                    <!-- form input end -->
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
    <!-- add modal end -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    function sellOrExchange() {
        var sell = document.getElementById("on_sell");
        var exchange = document.getElementById("on_exchange");
        let price = document.getElementById("price_input");
        if (sell.checked) {
            price.style.display = "block";
        } else if (exchange.checked) {
            price.style.display = "none";
        }
    }


    // function getDetails(updateid){

    // $('#hiddenId').val(updateid);
    // $.post("updateBook.php", {
    //   updateid: updateid
    // }, function(data, status){
    //     var book = JSON.parse(data);
    //     $('#up_book_Name').val(book.title);
    //     $('#up_book_author').val(book.author);
    //     $('#up_book_description').val(book.description);
    //     $('#up_price_input').val(book.price);
    //     $('#up_book_image').val(book.image);
    // });

    // $('#updateBook').modal('show');
    // }
    </script>

    <script>
    let faculty_or_student = "<?php echo $job ?>";
    if (faculty_or_student == "F") {
        document.querySelectorAll("#faculty_rating").forEach((e) => e.style.display = "none");
    }
    </script>

</body>

</html>