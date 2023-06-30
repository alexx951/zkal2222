<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
 
     $link = new mysqli("localhost", "root", "root", "ipssi_quizzeo");
     $sql = "SELECT cho_id, cho_label, cho_goodanswer, que_id FROM cho_choice WHERE que_id ='$id'" ; 
      $result= $link->query($sql); 
      if (!empty($result) && $result->num_rows > 0) {
 while($row=$result->fetch_assoc()){
  echo "id:" . $row["cho_id"] ."label:" . $row ["cho_label"] . "goodanswer" . $row["cho_goodanswer"]. "id_question" . $row["que_id"]. "<br>";
   }}
   else{
    echo "0 resultat";
   }
   $link->close();
    } 
   

?>