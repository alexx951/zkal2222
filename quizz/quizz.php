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
    $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
$sql = "SELECT que_id, que_label, que_difficulte, qui_id FROM que_question WHERE qui_id ='$this->id'" ; 
$result= $link->query($sql);
$i = 1;
if (!empty($result) && $result->num_rows > 0)
 {
    while($row=$result->fetch_assoc()){ 
        $question = new Question($row ["que_label"],$row["que_id"]);  
        $this->ajouterQuestion($question);
        if( $i == 1) 
        { 
            echo   " <div id=\"blockquestion".$question->getid() ."\"style=\"display: block\">";
         }else
         {
            echo   "<div id=\"blockquestion".$question->getid() ."\" style=\"display: none\">";
            
         } 
         echo  "<br><br><p>". $question->GetTexte() . "</p><br>"; 
        $questionid =  $question->Getid();
       
        $link1 = new mysqli("localhost", "root", "", "ipssi_quizzeo");
        $sql1 = "SELECT cho_id, cho_label, cho_goodanswer, que_id FROM cho_choice WHERE que_id=  $questionid " ; 
        $result1= $link1->query($sql1); 
            
        if (!empty($result1) && $result1->num_rows > 0) 
        {
            while($row1=$result1->fetch_assoc())
            {
                $reponse=new reponse($row1["cho_label"],$row1["cho_id"], $row1["cho_goodanswer"], $row1["que_id"]);  
                $question->ajouterReponse($reponse) ;
                echo '<br> '.$reponse->getTexte().' <input type=\'radio\' onclick="Showdiv('.   $row1["que_id"]  .','. $row1["cho_goodanswer"] .');"  name=\"radio'.  $row1["que_id"] .'     \" value="'.$reponse->getId().'" />';
            }
        }
        else
        {
            echo "0 resultat";
        }
        echo  '</div>';
        $i= $i+1;
        $link1->close(); 
     
    }
    $link->close(); 
   
}  
else
{
    echo "0 resultat";
} 
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
$this->reponses[] =    $reponse;
 
    }

 public function afficherQuestion() {
echo $this->texte . "<br>";
    }
   
 public function afficherReponses() {
foreach ($this->reponses as $reponse) {

 echo '<input type=\'checkbox\' name=\"checkbox\" value="'.$reponse->getTexte().'" />'.$reponse->getTexte(); 
        }
    }


    public function GetId()  {
        return  $this->id   ;
            }

            public function GetTexte()  {
                return  $this->texte   ;
                    }
                    public function GetReponses()  {
                        return  $this->reponses ;
                            }
}

 class Reponse {
private $texte;
private $estCorrecte;
private $id;
private $Questionid;

 public function __construct(string $texte, int $id,bool  $estCorrecte,int $Questionid) {
$this->texte = $texte;
$this->id = $id;
$this->estCorrecte = $estCorrecte;
$this->Questionid = $Questionid;

    }

 public function getTexte() {
return $this->texte;
    }

    public function getQuestionId() {
        return $this->Questionid;
            }


            public function getId() {
                return $this->id;
                    }
}

 
?>