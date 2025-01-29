<?php
include 'connectdb.php';
$id = $_GET['updateId'];
$userId = $_GET['userid'];
$sql = "SELECT * FROM `booksdetail` where book_id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $bookName = $row['title'];
    $bookAuthor = $row['author'];
    $bookDescription = $row['description'];
    $bookPrice =  $row['price'];
    $bookImages = $row['image'];

    if($bookPrice > 0){
        echo '<script>
        document.getElementById("on_sell").checked = true;
        document.getElementById("price_input").style.display = "block";
        </script>';
    }
    else{
        echo '<script>
        document.getElementById("on_exchange").checked = true;
        document.getElementById("price_input").style.display = "none";
        </script>';
    }

}


if(isset($_POST['submit'])){
    $bookName = $_POST['bookName'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookDescription = $_POST['bookDescription'];
    $bookPrice = ($_POST['bookprice'])>0 ? $_POST['bookprice'] : 0;

    //Deleting prevesious image if changed
    $bookImages2 = $_FILES['bookImage']['name'];
    if($bookImages2 == ""){
        $upload_image = $bookImages;
    }
    else{
        unlink($bookImages);
    }

    $imagefiletemp = $_FILES['bookImage']['tmp_name'];
    $filename_sepatare = explode('.', $bookImages2);
    $fileextention = strtolower(end($filename_sepatare));

    $allowedextention = array('jpg', 'jpeg', 'png');
    if(in_array($fileextention, $allowedextention)){
        $upload_image = 'bookImages/'.$bookImages2;
        move_uploaded_file($imagefiletemp, $upload_image);
    }
    else{
        echo "Please upload jpg, jpeg or png file";
    }

    $sql = "update booksdetail set title='$bookName', author='$bookAuthor', description='$bookDescription', price='$bookPrice', image='$upload_image' where book_id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:bookdisplay.php?userid='.$userId.'');
    }
    else{
        echo "Data not updated successfully";
        die(mysqli_error($conn));
    }
}




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Book-UIUPeers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form action="" method="post" enctype="multipart/form-data">
              <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Update Book</p>
              <!-- Book title -->
              <div class="form-outline mb-4">
                <label for="book_Name" class="form-label">Book name</label>
                <input type="text" class="form-control" id="book_Name"
                name="bookName" value= "<?php echo $bookName?>">
              </div>

              <!-- Author name -->
              <div class="form-outline mb-4">
                <label for="book_author" class="form-label">Book author </label>
                <input type="text" class="form-control" id="book_author"
                name="bookAuthor" value= "<?php echo $bookAuthor ?>">
              </div>

              <div class="form-outline mb-4">
                <label for="book_description" class="form-label"
                  >Book description</label
                >
                <input type="text" class="form-control" id="book_description"
                name="bookDescription" value= "<?php echo $bookDescription ?>">
              </div>

              <div class="form-outline mb-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="on_sell"
                    name="sell_or_exchange"
                    onclick="sellOrExchange()"
                  />
                  <label class="form-check-label" for="on_sell"> sell </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    id="on_exchange"
                    name="sell_or_exchange"
                    onclick="sellOrExchange()"
                    checked
                  />
                  <label class="form-check-label" for="on_exchange">
                    Exchange
                  </label>
                </div>
              </div>

              <div
                class="form-outline mb-4"
                id="price_input"
                style="display: none"
                value= "<?php echo $bookPrice ?>"
              >
                <label for="priceOfBook" class="form-label">Price</label>
                <input
                  type="text"
                  class="form-control"
                  id="priceOfBook"
                  name="bookprice"
                  value= "<?php echo $bookPrice ?>"
                />
              </div>

              <!-- File upload -->
              <div class="form-outline mb-4">
                <label for="book_image" class="form-label">Book image</label>
                <img src="<?php echo $bookImages ?>" alt="" width="100px" height="100px">
                <input type="file" class="form-control" id="book_image"
                name="bookImage" >
              </div>

              <!-- Submit button -->
              <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <button type=" submit" class="btn btn-warning btn-lg text-light my-2 py-3"
              style="width: 100%; border-radius: 30px; font-weight: 600" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    
    
  </body>

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

    document.getElementById("price_input");
    if(<?php echo $bookPrice ?> > 0){
        document.getElementById("on_sell").checked = true;
        document.getElementById("price_input").style.display = "block";
    }
    else{
        document.getElementById("on_exchange").checked = true;
        document.getElementById("price_input").style.display = "none";
    }
    
  </script>
</html>
