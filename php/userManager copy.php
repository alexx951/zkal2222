

 
  <?php

  
  $link = mysqli_connect("localhost", "root", "", "ipssi_quizzeo");
                 
    
         
    
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

      

  $sql = "SELECT 1 FROM usr_user WHERE usr_pseudo = $usr_pseudo and usr_password = $password"; 

  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0) 
      {
          
         
return true;
      } 
     
else {
          
         
return false;
      }
  }
?> 
    <form action="quiz.html" method="post">
      <label for="username">Nom d'utilisateur:</label>
      <br>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Mot de passe:</label>
      <br>
      <input type="password" id="password" name="password" required>
      <br>
      <input type="submit" value="Se connecter">
     
    </form>
    <a href ="page_d_inscreption.html"> Vous n'avez pas de compte? S'inscrire</a>
 
  
  
 
 