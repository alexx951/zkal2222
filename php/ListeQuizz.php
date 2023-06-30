
<DOCTYPE html>
  <html> 

<body>
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
      echo  $questions->GetTexte() . "<br>";
      echo  $questions->afficherReponses() . "<br>";

    }
   

}


?>
<?php
$listerep[] = $questions->afficherReponses();
for($i=0; $i<9; $i++){ ?>


<input type="checkbox" name="[]" value="Tarte aux prunes" /><?php echo $listerep[$i]; ?><br />
<?php }?>
</body>
  </html>
