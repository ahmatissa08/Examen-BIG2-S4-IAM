<?php require_once '../controllers/UserController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST">
        <label>Nom d'utilisateur:</label>
        <input type="text" name="username" required><br>
        <label>Mot de passe:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Connexion">
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <p><a href="register.php">Pas encore inscrit ? Inscription</a></p>
</body>
</html>
