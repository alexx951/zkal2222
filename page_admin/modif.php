<?php

if (isset($_GET['modify'])) {
    $id = $_GET['modify'];

    $sql = "SELECT * FROM usr_user WHERE usr_id      = :id";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
        <h2>Modification du profil de <?php echo $user['Username']; ?></h2>
        <form method="POST" action="">
            <input type="hidden" name="ID" value="<?php echo $user['ID']; ?>">

            <label for="Username">Pseudonyme:</label>
            <input type="text" name="Username" id="Username" value="<?php echo $user['Username']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="Email" id="Email" value="<?php echo $user['Email']; ?>" required><br>

            <label for="">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp" value="<?php echo $user['mdp']; ?>" required><br>

            <label for="Role">Role:</label>
            <input type="texte" name="Role" id="Role" value="<?php echo $user['Role']; ?>" required><br>

            <input type="submit" name="modifier" value="Modifier l'utilisateur">
        </form>
    <?php
    if (isset($_POST['modifier'])) {
        $id = $_POST['ID'];
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $role = $_POST['Role'];
        $password = $_POST['mdp'];
        $password = password_hash($password, PASSWORD_DEFAULT); 
    
        $sql = "UPDATE user SET Username = :Username, Email = :Email, mdp = :mdp, Role = :Role WHERE ID = :ID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Username', $username);
        $stmt->bindParam(':Email', $email);
        $stmt->bindParam(':mdp', $password);
        $stmt->bindParam(':Role', $role);
        $stmt->bindParam(':ID', $id);
        $stmt->execute();
        header("location: index.php");
    }
    }

?>
