

<!DOCTYPE html>
<html>
 
<head>
  <title>Quizzeo</title>
  <link rel="stylesheet" href="../connexion/connet.css">
</head>
<body>
  <div class="logo">QUIZZEO</div>
  <div class="log1">
    <img src="../photo/quiz (1).png" alt="qizzimage">
    
    </div>        
    <div class="log2">

      <img src="../photo/idees.png" alt="quizzimage">
    </div>
    <div class="log3">

      <img src="../photo/idees.png" alt="quizzimage">
    </div>
    <div class="log5">

      <img src="../photo/quiz (3).png" alt="quizzimage">
    </div>
    <div class="log6">

      <img src="../photo/quiz (3).png" alt="quizzimage">
    </div>

    
  <div class="cadre">
   <form method="post">
      <label for="username">Nom d'utilisateur:</label>
      <br>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Mot de passe:</label>
      <br>
      <input type="password" id="password" name="password" required>
      <br>
      <input type="submit" id="bo" value="Se connecter">
     
    </form>
    <a href ="../inscription/page_d_inscription.php"> Vous n'avez pas de compte? S'inscrire</a>
  </div>
 
  <?php include "../connexion/conect.php"; ?>
 

  
</body>
</html>
