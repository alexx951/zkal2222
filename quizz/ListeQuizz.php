
<DOCTYPE html>
  <html> 
<head>
  <link rel="stylesheet" href="../quizz/listequizz.css">
</head>
<body>
<form method="post">

<input type="hidden" id="score" name="score" value="0">
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
    $score = $_POST['score'];
    echo 'score'. $score ;
    $usr_qui_score =   $score  ; //a calculer 
    $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
    $sql = "CALL `usrAddScore`('$usr_id','$qui_id','$usr_qui_score')" ;
    header('location: ../quizz/message.php?score='. $score);
    $link->query($sql); 

    }
 
 
?> 
<input type="submit" id="bouton" value="participer">
</form>
 <script type="text/javascript">
  function  Showdiv(id, goodanswer )
    {   console.log(goodanswer);

        score=        document.getElementById('score').value;
        if (goodanswer==1)     
        {
          score=parseInt(score)+1;
        }
        console.log(score);
        document.getElementById('score').value  = score;
        id = id+1;
        id = "blockquestion"+ id ;
        divInfo = document.getElementById (id);  
        divInfo.style.display = 'block';
 
    } 
  </script> 
</body>
</html>
