<?php require_once '../controllers/UserController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <label>Nom d'utilisateur:</label>
        <input type="text" name="register_username" required><br>
        <label>Mot de passe:</label>
        <input type="password" name="register_password" required><br>
        <label>Rôle:</label>
        <select name="register_role">
            <option value="utilisateur">Utilisateur</option>
            <option value="admin">Admin</option>
        </select><br>
        <input type="submit" name="register" value="Inscription">
    </form>
    <?php if (isset($success)) echo "<p>$success</p>"; ?>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <p><a href="login.php">Déjà inscrit ? Connexion</a></p>
</body>
</html>
