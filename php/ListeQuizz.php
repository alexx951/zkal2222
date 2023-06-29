<?php
include "../php/quizz.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $monQuiz = new Quiz($id);
    $monQuiz->LoadData(); 

    $questionarray = $monQuiz->Getquestions();
    foreach(  $questionarray as $questions)
    { 
      echo  "texte des questions " .  $questions->GetTexte();

    }
}


?>