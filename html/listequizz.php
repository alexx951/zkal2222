<!DOCTYPE html>
<html>
<head>

<div class="cadre">
   <form method="post">
      <label for="id">id quizz:</label>
      <br>
      <input type="text" id="id" name="id" required>
      <br>

      <input type="submit" id="bouton" value="bouton">
      <?php include "../php/ListeQuizz.php"; ?>

     </form>












  <!-- <title>Quiz</title>
  <link rel="stylesheet" type="text/css" href="listequizz.css">
</head>
<body>
  <h1>Choisissez une categorie de quiz :</h1>
  <div class="categories">  
    <button class="category-btn" onclick="startQuiz('sport')">Sport</button>
    <button class="category-btn" onclick="startQuiz('histoire')">Histoire</button>
    <button class="category-btn" onclick="startQuiz('musique')">Musique</button>
  </div>

  <script src="listequizz.js"></script>
</body> -->
</html>