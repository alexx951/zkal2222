<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usr_id = $_POST['identifiant utilisateur'];
    $qui_id = $_POST['identifiant quizz'];
    $usr_qui_score = $_POST['score'];
     $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
    $sql = "INSERT INTO usr_qui(usr_id,qui_id,usr_qui_score)
    VALUES ('$usr_id', '$qui_id', '$usr_qui_score')";
    $link->query($sql);
  
    }







?>