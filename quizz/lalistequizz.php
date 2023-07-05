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
      <?php include "../quizz/ListeQuizz.php"; ?>

     </form>
</html>