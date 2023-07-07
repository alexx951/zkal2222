<!DOCTYPE html>
<html>
 
<body>
  <h1>creation quizz</h1>  
  <div>
  <form method="post" action="../creatquizz/creation_quizzeur.php">
  <link rel="stylesheet" href="../creatquizz/style.css">
        <label>titre</label>
        <input type="texte" name="titre" required=""> <br> 
        <label>difficulter</label>
        <select name="difficulter">
            <option value="1">facile</option>
             <option value="2">moyen</option>
             <option value="3">difficile</option>
        </select>
        <div id="question"><div id="creation"></div></div>

        <div class="divquestion">
            <label>Question  </label><br>
            <input type="texte" name="name" placeholder ="entrer la question" required=""><br>
            <label>Reponse </label><br>
            <input type="texte" name="Namereponse1" placeholder ="bonne reponse" required="">
            <br>
            <input type="texte" name="Namereponse2" placeholder ="mauvaises reponses" required="">
            <br>  
            <input type="texte" name="Namereponse3" placeholder ="mauvaises reponses" required="">
            <br>  
        </div> 
     
        <input type="submit" value="Création">
     
    </form> 
  </div>
 
</body>  
</html>
