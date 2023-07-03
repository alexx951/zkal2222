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

