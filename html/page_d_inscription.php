<!DOCTYPE html>
<html>
<head>
  <title>Formulaire d'inscription</title>
  <link rel="stylesheet" href="../css/inscription.css">
</head>
<body>
  <h2>Formulaire d'inscription</h2>
  <form method="post" action="../php/inscription.php" action="../php/inscription.php">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="S'inscrire">
  </form>
</body>
</html>