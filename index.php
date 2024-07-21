<?php
require_once 'controllers/ClientController.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion de Clientèle</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <script src="assets/js/scripts.js"></script>
</head>
<body>
    <h1>Liste des Clients</h1>
    <?php require_once 'views/templates/header.php'; ?>
    <form method="GET">
        <label>Filtrer par:</label>
        <select name="filter_column">
            <option value="nom">Nom</option>
            <option value="adresse">Adresse</option>
            <option value="telephone">Téléphone</option>
            <option value="statut">Statut</option>
        </select>
        <input type="text" name="filter_value">
        <label>Trier par:</label>
        <select name="sort_column">
            <option value="nom">Nom</option>
            <option value="adresse">Adresse</option>
            <option value="telephone">Téléphone</option>
            <option value="statut">Statut</option>
        </select>
        <select name="sort_order">
            <option value="ASC">Ascendant</option>
            <option value="DESC">Descendant</option>
        </select>
        <input type="submit" value="Appliquer">
    </form>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Sexe</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?php echo $client['nom']; ?></td>
            <td><?php echo $client['adresse']; ?></td>
            <td><?php echo $client['telephone']; ?></td>
            <td><?php echo $client['email']; ?></td>
            <td><?php echo $client['sexe']; ?></td>
            <td><?php echo $client['statut']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
                    <input type="submit" name="delete" value="Supprimer">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <button onclick="window.print()">Imprimer la liste</button>
    <h2>Ajouter un Client</h2>
    <form method="POST">
        <label>Nom:</label><input type="text" name="nom" required><br>
        <label>Adresse:</label><input type="text" name="adresse" required><br>
        <label>Téléphone:</label><input type="text" name="telephone" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Sexe:</label>
        <select name="sexe">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select><br>
        <label>Statut:</label>
        <select name="statut">
            <option value="Actif">Actif</option>
            <option value="Inactif">Inactif</option>
        </select><br>
        <input type="submit" name="add" value="Ajouter">
    </form>
    <?php require_once 'views/templates/footer.php'; ?>
</body>
</html>
