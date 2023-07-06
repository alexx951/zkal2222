<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div >
   <?php
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        { 
            $score= $_GET['score'];
            echo '<p>Merci d avoir participé,votre score  </p>'.$score;
        }
    ?>
 <br><br><a href ="../quizz/jouer.php">rejouez </a>


    </div>


</body>
</html>