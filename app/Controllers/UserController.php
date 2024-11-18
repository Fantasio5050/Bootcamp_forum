<?php
// UserController.php

include 'app/Models/UserModels.php';

class UserController {
    private $userService;

    public function __construct($pdo)
    {
        $this->userService = new UserService($pdo);
    }

    // Page de connexion
    public function login()
    {
        // Démarre la session si elle n'a pas déjà été démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Si l'utilisateur est déjà connecté, rediriger vers la page des sujets
        if (isset($_SESSION['user'])) {
            header('Location: index.php?action=topic');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Vérifier si l'email ou le mot de passe n'est pas vide
            if (!empty($email) || !empty($password)) {
                // Vérifier les informations de connexion
                $user = $this->userService->connectUser($email, $password);
                if ($user) {
                    $_SESSION['user'] = $user;  // L'utilisateur est connecté
                    header('Location: index.php?action=topic');
                    exit;
                }
            } 
        }

        // Définir la vue pour le formulaire de connexion
        global $view;
        $view = 'app/Views/LoginView.php'; // Définir la vue
    }

    public function register()
    {
        // Si l'utilisateur est déjà connecté, on le redirige
        if (isset($_SESSION['username'])) {
            header('Location: index.php?action=topic');
            exit;
        }

        $error_empty = false;
        $error_email_exists = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //var_dump($_POST); // Cela va afficher les données POST envoyées.

            // Récupération des données du formulaire
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($username) || empty($email) || empty($password)) {
                $error_empty = true;
            } else {
                if ($this->userService->checkUserExist($email)) {
                    $error_email_exists = true;
                } else {
                    // Appel de la méthode pour créer l'utilisateur
                    $this->userService->registerUser($username, $email, $password); // Création du compte
                    $_SESSION['username'] = $username;
                    header('Location: index.php?action=user&&def=login');
                    exit;
                }
            }
        }

        // Vue de l'inscription
        global $view;
        $view = 'app/Views/RegisterView.php';
        return compact('error_empty', 'error_email_exists');
    }

    // Déconnexion
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=topic');
        exit;
    }
}
?>
