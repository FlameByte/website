<?php



    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $database = "booking";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $query = "INSERT INTO kalender (`start_date`, `end_date`, `Maja_ID`) VALUES ('".$_POST['booking']."','".$_POST['booking2']."',1)";
    $conn->query($query);
    if($conn->rows_affected <= 0) {
        echo "midagi läks valesti";
    }
    $conn->close();
    header('Location: broneeri.php');
    exit();






?>