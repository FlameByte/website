<?php
session_start();
// Andmebaasi informatsioon
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'admin';
$DATABASE_PASS = 'admin';
$DATABASE_NAME = 'phplogin';
// Ühendab andmebaasiga
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// kui ühendamisega probleem
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Kui andmed, mis on logimise jaoks lisatud on saadetud, siis kontrollib kas andmeid selle kohta eksisteerib.
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Palun täita kasutajanimi ja parooli  lahtrid!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Salvestab andmed, et kontrollida kas andmebaasis on selline kasutaja.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Kasutaja eksisteerib
        // vaatab, kas parool on õige
        if ($_POST['password'] === $password) {
            // Kontrollimine õnnestus, loob sessiooni ja logib kasutaja sisse.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: index.php');
        } else {
            echo 'vale parool!';
        }
    } else {
        echo 'vale kasutajanimi!';
    }
	$stmt->close();
}
?>