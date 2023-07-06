<?php           session_start();   
                include "../database.php";
                global $db;
                if(!isset($_SESSION['email'])){
                    header("Location: ../PageConnexion/index.php");
                    exit;
                }
                $sql = "SELECT * FROM user WHERE Email = :Email"; 
                $result = $db->prepare($sql);
                $result->execute([
                    "Email" => $_SESSION['email'],
                ]);
                if($result->rowCount() > 0)
                {
                    $data = $result->fetchAll();
                } 
                if($data[0]['Role'] != 3){
                    header("Location: ../PageListing/index.php");
                    exit;
                }
?>