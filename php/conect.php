
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_post["bo"])) 
  {
        
$u=$_post["user"];
$p=$_post["password"];
 }
                           
$username = $_POST['username'];
$password = $_POST['password'];
$link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
// if ($link -> connect_errno >0)
//  {
// echo"failed to connect to sql" . mysqli_connect_errno();
// exit;
//  }
$sql = "SELECT * FROM usr_user WHERE usr_pseudo ='$username' and usr_password = '$password'" ; 
$result = $link->query($sql);
   
if(mysqli_num_rows($result)>0)
 { 
header('location: ../html/listequizz.php');
return true;
 }
         
else 
 {
echo"mauvais pseudo ou mot de passe ";
return false;
 }
      
}

?>