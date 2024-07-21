<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['generate_report'])) {
        $reportTitle = $_POST['report_title'];
        $reportContent = $_POST['report_content'];

        $stmt = $pdo->prepare("INSERT INTO rapports (titre, contenu) VALUES (?, ?)");
        $stmt->execute([$reportTitle, $reportContent]);
    }
}
?>
