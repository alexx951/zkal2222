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

    public function Getquestions()  {
    return  $this->questions ;
        }

 public function LoadData( ) {
    $link = new mysqli("localhost", "root", "root", "ipssi_quizzeo");
$sql = "SELECT que_id, que_label, que_difficulte, qui_id FROM que_question WHERE qui_id ='$this->id'" ; 
$result= $link->query($sql);

if (!empty($result) && $result->num_rows > 0)
 {
    while($row=$result->fetch_assoc()){
        $question = new Question($row ["que_label"],$row["que_id"]);  
        $this->ajouterQuestion($question);
    }
    $link->close(); 
}  
else
{
    echo "0 resultat";
}

 
$link = new mysqli("localhost", "root", "root", "ipssi_quizzeo");
foreach($this->questions as $questions)
{    
 
  $questionid = $questions->GetId();

    $sql = "SELECT cho_id, cho_label, cho_goodanswer, que_id FROM cho_choice WHERE   $questionid " ; 
    $result= $link->query($sql); 
        
    if (!empty($result) && $result->num_rows > 0) 
    {
        while($row=$result->fetch_assoc())
        {
            $reponse=new reponse($row["cho_label"], $row["cho_goodanswer"]);  
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


    public function GetId()  {
        return  $this->id   ;
            }

            public function GetTexte()  {
                return  $this->texte   ;
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

 
?>