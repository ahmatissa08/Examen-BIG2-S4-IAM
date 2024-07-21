<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: views/login.php");
    exit();
}
?>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="report.php">Rapports</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
           <li><a href="export_csv.php">Exporter en CSV</a></li>
           <li><a href="export_pdf.php">Exporter en PDF</a></li>
        </ul>
    </nav>
</header>
