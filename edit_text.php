<?php
session_start();
require('tekst.php');


if ($_SESSION['loggedin'] != true) {
    header('Location: index.php');
    exit();
}



if(isset($_POST['id']) && isset($_POST['text'])) { 
    $id = $_POST['id'];
    $text = $_POST['text'];
    update_text($id, $text);
}


?>