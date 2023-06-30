<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <h1>Choisissez une categorie de quiz :</h1>
  <div class="cadre">
   <form method="post">
   <label for="id">Choisissez une categorie:</label>

<select name="id" id="id" multiple>
  <option value="1">Sport</option>
  <option value="2">Histoire</option>
  <option value="3">Musique</option>
  
  
</select>
      <input type="submit" id="bouton" value="valider">
      
      <br>
      <?php include "../php/ListeQuizz.php"; ?> 

     </form>


  <script src="../js/listequizz.js"></script>
</body>
</html>