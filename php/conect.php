
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (isset($_post["bo"]))  {
        
$u=$_post["user"];
$p=$_post["password"];



     }
    header('location: ../html/listequizz.php');
    $username = $_POST['username'];
    
    $password = $_POST['password'];
    $link = mysqli_connect("localhost", "root", "", "ipssi_quizzeo");
  

    $sql = "SELECT * FROM usr_user WHERE usr_pseudo VALUES ('$username,'$password')"; 
$link->query($sql);
    echo "Nom d'utilisateur : " . $username . "<br>";
  
    
    echo "Mot de passe : " . $password . "<br>";
    // header('location: ../html/listequizz.php');
}

  if
  ($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0) 
      {
header('location: ../html/listequizz.php');
return true;
      } 
     
else {
          
         

echo"mauvais pseudo ou mot de passe ";
return false;
      }
  }

?>