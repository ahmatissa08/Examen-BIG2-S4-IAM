<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $format = $_GET['format'];

    $stmt = $pdo->query("SELECT * FROM clients");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($format === 'csv') {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=clients.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, array('Nom', 'Adresse', 'Téléphone', 'Email', 'Sexe', 'Statut'));

        foreach ($clients as $client) {
            fputcsv($output, $client);
        }
        fclose($output);
    } elseif ($format === 'pdf') {
        require_once '../libs/fpdf.php';

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Nom');
        $pdf->Cell(40, 10, 'Adresse');
        $pdf->Cell(40, 10, 'Téléphone');
        $pdf->Cell(40, 10, 'Email');
        $pdf->Cell(40, 10, 'Sexe');
        $pdf->Cell(40, 10, 'Statut');
        $pdf->Ln();

        foreach ($clients as $client) {
            $pdf->Cell(40, 10, $client['nom']);
            $pdf->Cell(40, 10, $client['adresse']);
            $pdf->Cell(40, 10, $client['telephone']);
            $pdf->Cell(40, 10, $client['email']);
            $pdf->Cell(40, 10, $client['sexe']);
            $pdf->Cell(40, 10, $client['statut']);
            $pdf->Ln();
        }
        $pdf->Output('D', 'clients.pdf');
    }
}
?>
