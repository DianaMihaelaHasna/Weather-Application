<?php


session_start();
include ("connection.php");
global $conn;
$user_id = $_SESSION["id_of_the_user"];


// preia valoarea variabilei 'theme'
$theme = $_GET['theme'];

// actualizează valoarea în baza de date
$stmt = $conn->prepare("UPDATE users SET tema = :tema WHERE id_user = :id");
$stmt->bindParam(':tema', $theme);
$stmt->bindParam(':id', $user_id);
$stmt->execute();

echo" <script> window.open('main.php','_self')</script>";

?>
