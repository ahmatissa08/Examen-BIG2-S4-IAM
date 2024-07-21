<?php
ini_set('memory_limit', '256M');

require_once __DIR__ . '/../config/config.php'; 
require_once __DIR__ . '/../fpdf/fpdf.php'; 

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Liste des Clients', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$limit = 100; 
$offset = 0;

do {
    $stmt = $pdo->prepare('SELECT nom, adresse, telephone, email, sexe, statut FROM clients LIMIT :limit OFFSET :offset');
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($clients as $client) {
        $pdf->Cell(40, 10, $client['nom'], 1);
        $pdf->Cell(40, 10, $client['adresse'], 1);
        $pdf->Cell(40, 10, $client['telephone'], 1);
        $pdf->Cell(40, 10, $client['email'], 1);
        $pdf->Cell(20, 10, $client['sexe'], 1);
        $pdf->Cell(20, 10, $client['statut'], 1);
        $pdf->Ln();
    }

    $offset += $limit;
} while (count($clients) == $limit);

$pdf->Output('D', 'clients.pdf');
exit();
?>
