<?php

   class Quiz {
private $questions;    
private $title;
private $difficult;
private $id;
 
 public function __construct(int $id) {
$this->questions = [];
$this->id = $id;
 }

 public function ajouterQuestion(Question $question) {
$this->questions[] = $question;
 }

 public function LoadData( ) {
    $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
$sql = "SELECT que_id, que_label, que_difficulte, qui_id FROM que_question WHERE qui_id ='$monQuiz->id'" ; 
$result= $link->query($sql);

if (!empty($result) && $result->num_rows > 0)
 {
    while($row=$result->fetch_assoc()){
        $question = new Question($row ["que_label"],$row["que_id"]);  
        $monQuiz->ajouterQuestion($question1);
    }
    $link->close(); 
    else
    {
        echo "0 resultat";
    }

}
$link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
foreach($monQuiz->questions as $questions)
{    
 
    $sql = "SELECT cho_id, cho_label, cho_goodanswer, que_id FROM cho_choice WHERE $question->id" ; 
    $result= $link->query($sql); 
        
    if (!empty($result) && $result->num_rows > 0) 
    {
        while($row=$result->fetch_assoc())
        {
            $reponse=new reponse($row["cho_label"], $row["estCorrecte"]);  
            $question->ajouterReponse($reponse) ;
        }
    }
    else
    {
        echo "0 resultat";
    }
}
$link->close();
 



     }

 public function afficherQuestions() {
foreach ($this->questions as $question) {
$question->afficherQuestion();
$question->afficherReponses();
        }
    }
}

 class Question {
private $texte;
private $reponses;
private $id;
private $idQuizz ;
 
 public function __construct(string $texte,int $id ) {
$this->texte = $texte;
$this->id = $id;
$this->reponses = [];
    }

 public function ajouterReponse(Reponse $reponse) {
$this->reponses[] = $reponse;
    }

 public function afficherQuestion() {
echo $this->texte . "<br>";
    }

 public function afficherReponses() {
foreach ($this->reponses as $reponse) {
echo $reponse->getTexte() . "<br>";
        }
    }
}

 class Reponse {
private $texte;
private $estCorrecte;
private $id;

 public function __construct($texte, $estCorrecte) {
$this->texte = $texte;
$this->estCorrecte = $estCorrecte;
    }

 public function getTexte() {
return $this->texte;
    }
}



// Création du quiz
$monQuiz = new Quiz(1);
$link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
$sql = "SELECT que_id, que_label, que_difficulte, qui_id FROM que_question WHERE qui_id ='$monQuiz->id'" ; 
$result= $link->query($sql);

if (!empty($result) && $result->num_rows > 0)
 {
    while($row=$result->fetch_assoc()){
        $question = new Question($row ["que_label"],$row["que_id"]);  
        $monQuiz->ajouterQuestion($question1);
    }
    $link->close(); 
    else
    {
        echo "0 resultat";
    }

}
$link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
foreach($monQuiz->questions as $questions)
{    
 
    $sql = "SELECT cho_id, cho_label, cho_goodanswer, que_id FROM cho_choice WHERE $question->id" ; 
    $result= $link->query($sql); 
        
    if (!empty($result) && $result->num_rows > 0) 
    {
        while($row=$result->fetch_assoc())
        {
            $reponse=new reponse($row["cho_label"], $row["estCorrecte"]);  
            $question->ajouterReponse($reponse) ;
        }
    }
    else
    {
        echo "0 resultat";
    }
}
$link->close();
 



 

     

    

// // Création des questions
// $question1 = new Question("Quelle est la capitale de la France ?");
// $question2 = new Question("Qui a peint la Joconde ?");

// // Création des réponses
// $reponse1_1 = new Reponse("Paris", true);
// $reponse1_2 = new Reponse("Londres", false);
// $reponse1_3 = new Reponse("Berlin", false);

// $reponse2_1 = new Reponse("Léonard de Vinci", true);
// $reponse2_2 = new Reponse("Pablo Picasso", false);
// $reponse2_3 = new Reponse("Vincent van Gogh", false);

// // Ajout des réponses aux questions
// $question1->ajouterReponse($reponse1_1);
// $question1->ajouterReponse($reponse1_2);
// $question1->ajouterReponse($reponse1_3);

// $question2->ajouterReponse($reponse2_1);
// $question2->ajouterReponse($reponse2_2);
// $question2->ajouterReponse($reponse2_3);

// // Ajout des questions au quiz
// $monQuiz->ajouterQuestion($question1);
// $monQuiz->ajouterQuestion($question2);

// // Affichage des questions et réponses du quiz
// $monQuiz->afficherQuestions();








?>