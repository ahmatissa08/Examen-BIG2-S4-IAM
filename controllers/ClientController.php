<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Client.php';

$clientModel = new Client($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $clientModel->addClient($_POST);
    } elseif (isset($_POST['update'])) {
        $clientModel->updateClient($_POST['id'], $_POST);
    } elseif (isset($_POST['delete'])) {
        $clientModel->deleteClient($_POST['id']);
    }
}

$filter_column = isset($_GET['filter_column']) ? $_GET['filter_column'] : 'nom';
$filter_value = isset($_GET['filter_value']) ? $_GET['filter_value'] : '';
$sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'nom';
$sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

$clients = $clientModel->getAllClients($filter_column, $filter_value, $sort_column, $sort_order);
?>
