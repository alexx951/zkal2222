<?php


include "../database.php";
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM user WHERE ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("location: index.php");
}
?>