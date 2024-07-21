<?php
session_start();
require_once '../config/config.php';
require_once '../models/User.php';

$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: ../views/index.php");
            exit();
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
        }
    } elseif (isset($_POST['register'])) {
        $username = $_POST['register_username'];
        $password = $_POST['register_password'];
        $role = $_POST['register_role'];

        if ($userModel->addUser(['username' => $username, 'password' => $password, 'role' => $role])) {
            $success = "Inscription réussie. Vous pouvez maintenant vous connecter.";
        } else {
            $error = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }
}
?>
