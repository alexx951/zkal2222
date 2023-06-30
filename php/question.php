<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $link = new mysqli("localhost", "root", "root", "ipssi_quizzeo");
    $sql = "SELECT que_id, que_label, que_difficulte, qui_id FROM que_question WHERE qui_id ='$id'" ; 
    $result= $link->query($sql);
    
    if (!empty($result) && $result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
    echo "id:" . $row["que_id"] ."label:" . $row ["que_label"] . "difficulté" . $row["que_difficulte"]. "id_quizz" . $row["qui_id"]. "<br>";
     }
    }
   else{
    echo "0 resultat";
   }
   $link->close();
    }
   

?>