<?php
require_once __DIR__ . '/../config/config.php'; 

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=clients.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('Nom', 'Adresse', 'Téléphone', 'Email', 'Sexe', 'Statut'));

$clients = $pdo->query('SELECT nom, adresse, telephone, email, sexe, statut FROM clients');

foreach ($clients as $client) {
    fputcsv($output, $client);
}
fclose($output);
exit();
?>
