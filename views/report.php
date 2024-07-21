<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../controllers/ReportController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Générer un Rapport</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <h1>Générer un Rapport</h1>
    <form method="POST">
        <label>Titre du Rapport:</label>
        <input type="text" name="report_title" required><br>
        <label>Contenu du Rapport:</label>
        <textarea name="report_content" required></textarea><br>
        <input type="submit" name="generate_report" value="Générer">
    </form>
</body>
</html>
