
<!DOCTYPE html>

<html>
<head>
  <title>Quiz</title>
  <!-- <link rel="stylesheet" href="../quizz/listequizz.css"> -->
  <link rel="stylesheet" href="./jouermichel.css">
  <style>
   .test{

  
 
padding: 5px 10px;
  
 
font-size: 14px;
  
 
background-color: #8B0000;
  
 
color: #FFFFFF;
  
 
border: none;
  
 
border-radius: 4px;
  
 
cursor: pointer;
}

.test:hover {
  
 
background-color: #800000;
}

.test:focus {
  outline: none;
  
 
box-shadow: 0 0 0 2px #FFFFFF, 0 0 0 4px #8B0000;
}

    </style>
</head>

<body>
  <h1>Choisissez une catégorie de quiz :</h1><br>

  <div class="tropher">

<img src="../photo/tropher.jpg" alt="tropher">
</div>
<div class="trophé">

<img src="../photo/tropher.jpg" alt="trophé">
</div>
  <?php
  session_start();
   $rol_id = $_SESSION['rol_id'] ;

   $usr_id = $_SESSION['usr_id'] ; 
   $qui_id =   $_SESSION['qui_id']  ; 

   
  if( $rol_id==2){
    ?>
     <div class="creation"><?php
     echo "creation de quizz<br>";
     echo "<a href=../creatquizz/creationquizz.php value='button'name='nouveau quizz'>nouveau quizz</a><br>";?></div>
  <?php   
}
else{
  echo"Création de quizz impossible <br> ";
}
  $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");

  $sql  = "SELECT qui_id, qui_title FROM `qui_quizz`" ; 
  $resultquizzs = $link->query($sql);
    
 if(mysqli_num_rows( $resultquizzs)>0)
  { 
    $id=1;
  
    echo "Liste des quizz <br> ";
   while($rowquizzs= $resultquizzs->fetch_assoc())
   { 
    echo "<a href=../quizz/ListeQuizz.php?id=".$rowquizzs['qui_id'].">".$rowquizzs['qui_title']."</a><br> ";
    if($id>3){
      ?>
           <div class=supprimer><?php echo "<a class='test' href=../creatquizz/suppression.php?delete=".$rowquizzs['qui_id']."?>Supprimer</a>";?></div>

      <?php
    }
     ?> 
     <?php
     $id=$id+1;
    
   }


 
} 
?>

 
<!--   
   <form method="post" action="../quizz/ListeQuizz.php"  > 
    <input type="submit" name="btn" value="1" />  <img src="../photo/histoire.png" alt="histoire">
    <input type="submit" name="btn" value="2" /> <img src="../photo/sport.png" alt="sport"> 
    <input type="submit" name="btn" value="3" /> <img src="../photo/piano.png" alt="piano">  
 </form> -->
 <a  href ="../connexion/page_de_connexion.php"> Deconnexion</a>
</body>
</html>