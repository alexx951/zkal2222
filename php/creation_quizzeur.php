<?php
 
echo 'test';
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre']; 
        $difficulte= $_POST['difficulter'];
        $NameQuestion = $_POST ['name'];
        $Namereponse1 = $_POST ['Namereponse1']; 
        $Namereponse2 = $_POST ['Namereponse2'];
        $Namereponse3 = $_POST ['Namereponse3'];

       
     $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
     $sql = "CALL `addquizz`('$titre',' $difficulte','$NameQuestion','$Namereponse1',' $Namereponse2',' $Namereponse3')" ;
     
     $link->query($sql);
     header("Location:../html/jouer.php");
   }
 
?>  




 
