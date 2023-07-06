
<DOCTYPE html>
  <html> 
<head>
  <link rel="stylesheet" href="../quizz/listequizz.css">
</head>
<body>
<form method="post">
<?php
include "../quizz/quizz.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET')
 {
    
    $id = $_GET['id'];
    
    $_SESSION['qui_id'] =   $id ;
    $monQuiz = new Quiz($id);
    $monQuiz->LoadData(); 
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST')  
  {  
   
    $usr_id = $_SESSION['usr_id'] ; 
    $qui_id =   $_SESSION['qui_id']  ; 


    $usr_qui_score = 300; //a calculer 
    $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
    $sql = "CALL `usrAddScore`('$usr_id','$qui_id','$usr_qui_score')" ;
    header('location: ../quizz/jouer.php');
    $link->query($sql); 

    }
 
 
?> 
<input type="submit" id="bouton" value="participer">
</form>
 <script type="text/javascript">
  function  Showdiv(id)
    {
        id = id+1;
        id = "blockquestion"+ id ;
        divInfo = document.getElementById (id);  
        divInfo.style.display = 'block';
 
    } 
  </script> 
</body>
</html>
