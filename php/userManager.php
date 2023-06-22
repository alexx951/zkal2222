<?php

if(isset($_POST["submit"]))
{
        $e = $_POST["email"];
        $p = $_POST["pwd"];

    $sql = "SELECT * FROM User WHERE Email = :Email"; 
    $result = $link->prepare($sql);
    $result->execute([
        "Email" => $e
    ]);
    if($result->rowCount() > 0)
        {
            $data = $result->fetchAll();
            if(password_verify($p,$data[0]['mdp']))
            {
                echo "Connexion effectuée";
                $_SESSION['Email'] = $e;
            }
            echo $e;
            echo $p;

        } else
        {
            echo "Identifiant ou mot de passe erroné"; 
        }
}

       
    public function verifierConnexion($usr_pseudo , $password ) {
            
        $link = mysqli_connect("localhost", "root", "", "demo");
                 
    
         
    
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    
            
    
        $sql = "SELECT 1 FROM usr_user WHERE usr_pseudo = $usr_pseudo and usr_password = $password"; 
    
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0) 
            {
                
               
    return true;
            } 
           
    else {
                
               
    return false;
            }
        }}
    
    
    
 

?>

connecter(identifiant et password ): bool 
select (identifiant) : total user 
creer un user(identifiant,email,mot de passe et role):bool ou id 
modifier son role (user id et role id)
manager quizz(select des quizz)





reponse_manager (good_label, label)
ad(id_reponse)
select 
all quetion

quizz manager
select list: all quizz
ad:titre, difficulter , creation (id_quizz)

modification(total quizz,id_quizz):bool ou id 

question_manager
select all question(id_quizz):all question 
ad question:label, difficulter , creation

choice manager 
select liste:question 
ad choise: label, goodanswer,id                            