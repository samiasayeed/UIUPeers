<?php
    // Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "uiupeers";

// Create a connection
$conn = mysqli_connect($servername, $username, $password);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
    echo "<br>";
}

//use db
$sql = "use $databasename";
$result = mysqli_query($conn, $sql);

?>