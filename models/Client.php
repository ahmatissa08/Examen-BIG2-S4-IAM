<?php
class Client {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllClients($filter_column = 'nom', $filter_value = '', $sort_column = 'nom', $sort_order = 'ASC') {
        $query = "SELECT * FROM clients WHERE $filter_column LIKE ? ORDER BY $sort_column $sort_order";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["%$filter_value%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addClient($data) {
        $stmt = $this->pdo->prepare("INSERT INTO clients (nom, adresse, telephone, email, sexe, statut) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$data['nom'], $data['adresse'], $data['telephone'], $data['email'], $data['sexe'], $data['statut']]);
    }

    public function updateClient($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE clients SET nom = ?, adresse = ?, telephone = ?, email = ?, sexe = ?, statut = ? WHERE id = ?");
        return $stmt->execute([$data['nom'], $data['adresse'], $data['telephone'], $data['email'], $data['sexe'], $data['statut'], $id]);
    }

    public function deleteClient($id) {
        $stmt = $this->pdo->prepare("DELETE FROM clients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
