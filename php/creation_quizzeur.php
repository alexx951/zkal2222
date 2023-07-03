<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>creation quizz</h1>  
  <div class= "toto">
    <form methode="POST">
        <label>titre</label>
        <input type="texte" name="titre" required=""> <br> 
        <label>difficulter</label>
        <select name="difficulter">
            <option value="1">facile</option>
             <option value="2">moyen</option>
             <option value="3">difficile</option>
        </select>
        <div id="question"><div id="creation"></div></div>
     <input type="submit" name="submit" value="submit"><br>
     



    </form>
    <button  onclick = "addquestion()">ajouter</button>
    <button  onclick = "deletequestion()">supprimer</button>

  </div>

    <script src="../js/creation_quizzeur.js"></script>




</body>
</html>