<?php
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if (isset($_POST['usr_id']))
     { 
    $usr_id   = $_POST['usr_id'];
    $qui_id = $_POST['qui_id'];
    $usr_qui_score = $_POST['usr_qui_score'];
    $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
    $sql = "CALL `usrAddScore`('$usr_id','$qui_id','$usr_qui_score')" ;
   
    $link->query($sql);
}
   
    }  
?>