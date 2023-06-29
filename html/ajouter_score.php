<!DOCTYPE html>
<html>
<body>
<div class="cadre">
   <form method="post">
      <label for="usr_id">usr_id</label>
      <br>
      <input type="text" id="usr_id" name="usr_id" required>
      <br>
      <label for="qui_id">qui_id:</label>
      <br>
      <input type="text" id="qui_id" name="qui_id" required>
      <br>
      <label for="usr_qui_score">score:</label>
      <br>
      <input type="text" id="usr_qui_score" name="usr_qui_score" required>
      <br>
      <input type="submit" id="boutonn" value="continuer">
      <?php include "../php/ajouter_score.php"; ?>
     </form>

  </div> 

</body>
</html>