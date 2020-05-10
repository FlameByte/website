<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$database = "puhkemaja";





function load_text($id){
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $database = "puhkemaja";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT `id`, `text` from website_text where `id`=".$id;
    $data = $conn->query($query);
    if ($data) {
    
    $row = $data->fetch_assoc();
    echo $row['text'];
    }
    }

function update_text($id, $text){
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $database = "puhkemaja";
    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $query = "UPDATE website_text SET `text` = '" . $text . "' WHERE `id` = ".$id;
    $conn->query($query);
    if($conn->rows_affected <= 0) {
        echo "midagi läks valesti";
    }
    $conn->close();
    header('Location: index.php');
    exit();

}


?>