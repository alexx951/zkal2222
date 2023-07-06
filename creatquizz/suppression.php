<?php           
session_start();   
                
               
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $link = new mysqli("localhost", "root", "", "ipssi_quizzeo");
                    $id = str_replace("?", "", $id);
                     
                    if($id>3){
                        $sql = " DELETE FROM qui_quizz WHERE `qui_quizz`.`qui_id` = '$id' ";    
                        $link->query($sql);
                       header("location:../quizz/jouer.php");
                    
                    }
                    else{
                    echo"impossible desupprimer";
header("location:../quizz/jouer.php");
                    }
                    
                }
                
?>