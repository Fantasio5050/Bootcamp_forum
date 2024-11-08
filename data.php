<?php
session_start();

// Validations plus robustes
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = $_POST['password'] ?? '';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// Vérifications améliorées
if (empty($username) || empty($password) || !$email) {
    $_SESSION['error_empty'] = true;
    header("Location: inscription.php");
    exit();
}

// Ici, remplacez par une vraie vérification en base de données
if ($username !== 'admin' || $password !== 'admin' || $email !== 'admin@example.com') {
    $_SESSION['error_incorrect'] = true;
    header("Location: inscription.php");
    exit();
}

// Connexion réussie
$_SESSION['username'] = $username;
$_SESSION['success'] = 'Inscription réussie !';
header("Location: accueil.php");
exit();