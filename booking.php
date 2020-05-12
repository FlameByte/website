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

    $name = $_POST['nimi'];
    $email = $_POST['email'];
    $teema = $_POST['teema'];
    $lisainfo = $_POST['lisainfo'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $hind = $_POST['hind'];



    $email_from = 'info@pilkuse.ee';
    $email_subject = "Puhkemaja broneering";
    $email_body = "Te olete broneerinud puhkemaja alates $start_date kuni $end_date, mille hinnaks on $hind:\n $teema . $lisainfo".
        
    $to = "henrilindret@gmail.com";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    //Saadab meili
    mail($to,$email_subject,$email_body,$headers);



?>