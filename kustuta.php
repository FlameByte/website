<?php 

session_start();


if ($_SESSION['loggedin'] != true) {
    header('Location: index.php');
    exit();
}

if(isset($_POST['number'])){
    $number = $_POST['number'];
    if($number <= 0){
        header('Location: index.php');
        exit();
    }

    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $database = "galerii";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT `imgfullname` FROM galerii where `ordergalerii` = " . $number;
    $data = $conn->query($query);
    $row = $data->fetch_assoc();
    unlink("img/galerii/" . $row["imgfullname"]);

    $query = "DELETE FROM galerii where `ordergalerii` = " . $number;
    $data = $conn->query($query);
    header('Location: index.php');
    exit();
}
?>