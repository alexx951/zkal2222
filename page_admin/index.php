<?php include 'verification.php'?>


<h1>Liste des utilisateurs</h1>


<table>
    <tr>
        <th>ID</th>
        <th>Pseudo</th>
        <th>Action</th>
    </tr>
    <?php $sql = "SELECT * FROM usr_user";
$result = $link->query($sql);while  ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Username']; ?></td>
            <td>
                <a href="modif.php?modify=<?php echo $row['ID']; ?>">Modifier</a><br>
                <a href="supp.php?delete=<?php echo $row['ID']; ?>">Supprimer</a>
            </td>
            
        </tr>
    <?php } ?>
</table>

    <?php include '../connexion/page_de_connexion.php'; ?>
    <script src="index.js"></script>
</body>
</html>