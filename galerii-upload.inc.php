<?php 


if (isset($_POST['submit'])) {

    $uusfailinimi = $_POST['filename'];
    if (empty($uusfailinimi)) {
        $uusfailinimi = "galerii";
    } else {
        $uusfailinimi = strtolower(str_replace(" ", "-", $uusfailinimi));
    }


    $file = $_FILES['file'];

    $filename = $file['name'];
    $filetype = $file['type'];
    $filetempname = $file['tmp_name'];
    $fileerror = $file['error'];
    $filesize = $file['size'];

    $fileext = explode(".", $filename);
    $fileactualext = strtolower(end($fileext));

    $allowed = array("jpg", "jpeg", "png", "HEIC", "heic");

    if (in_array($fileactualext, $allowed)) {
        if($fileerror === 0) {
            if ($filesize < 20000000) {
                $imagefullname = $uusfailinimi . "." . uniqid("", true). "." . $fileactualext;
                $filedestination = "img/galerii/" .$imagefullname;

                include_once "dbh.php";

                $sql = "SELECT * FROM galerii;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $rowcount = mysqli_num_rows($result);
                    $setimageorder = $rowcount + 1;
                    $sql = "INSERT INTO galerii (imgfullname, ordergalerii) VALUES (?, ?);";
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed";
                    } else {
                        mysqli_stmt_bind_param($stmt, "ss", $imagefullname, $setimageorder);
                        mysqli_stmt_execute($stmt);

                        move_uploaded_file($filetempname, $filedestination);

                        header("Location: index.php?upload=success");
                    }
                }
            } else {
                echo ("fail on liiga suur");
            }
        } else {
            echo "error";
            exit();
        }
    } else {
        echo "Lae üles jpg, jpeg või png fail.";
        exit();
    }

}




function kalender($start_time, $end_time, $Maja_ID){
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $database = "booking";
    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $query = "INSERT INTO kalender (start_time, end_time, Maja_ID) VALUES ('$start_time', '$end_time', 1)";
    $conn->query($query);
    if($conn->rows_affected <= 0) {
        echo "midagi läks valesti";
    }
    $conn->close();
    header('Location: index.php');
    exit();

}







?>