<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
 $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
$sql = "INSERT INTO usr_user(usr_pseudo,usr_email,usr_password)
VALUES ('$username', '$email', '$password')";
$link->query($sql);
echo "Nom d'utilisateur : " . $username . "<br>";
echo "Email : " . $email . "<br>";
echo "Mot de passe : " . $password . "<br>";
header('location: ../html/page_de_connexion.php');
}
?>