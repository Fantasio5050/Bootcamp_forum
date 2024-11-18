<?php
include 'config/database.php';

// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Empêcher le cache de s'afficher
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');

// Initialiser l'action et le topic_id
$act = isset($_GET['action']) ? $_GET['action'] . "Controller.php" : 'HomeController.php';
$topicId = isset($_GET['topic_id']) ? (int)$_GET['topic_id'] : null; 

// CONTAINER ///////////////////
if (file_exists('app/Controllers/' . $act)) {
    include 'app/Controllers/HeaderController.php';
    include $viewH;

    // Déterminer le nom du contrôleur
    $controllerName = basename($act, "Controller.php") . "Controller"; 
    $controllerFile = 'app/Controllers/' . $act;

    if (file_exists($controllerFile)) {
        include $controllerFile;

        // Instancier le contrôleur avec PDO
        $controller = new $controllerName($pdo);

        // Si le paramètre 'def' est présent et correspond à une méthode du contrôleur, on l'appelle
        if (isset($_GET['def']) && method_exists($controller, $_GET['def'])) {
            $method = $_GET['def']; 
            $control = $controller->$method($topicId);  // Appel dynamique de la méthode en passant topic_id
        } else {
            // Sinon, appeler la méthode 'index' du contrôleur
            if (method_exists($controller, 'index')) {
                $control = $controller->index($topicId);  // Passer topic_id à index si nécessaire
            }
        }

        // Définir la vue si elle n'est pas déjà définie
        if (!isset($view)) {
            $view = 'app/Views/TopicView.php'; 
        }

    } else {
        echo "Erreur : Le contrôleur spécifié n'existe pas.";
    }

    // Afficher la session 'user' si elle existe
    if (isset($_SESSION['user'])) {
        echo 'Vous êtes connecté en tant que ' . htmlspecialchars($_SESSION['user']['username']) . '.';
    } else {
        echo 'Aucun utilisateur connecté.';
    }

    // Inclusion de la vue, si elle existe
    if (isset($view) && file_exists($view)) {
        include $view;
    } else {
        echo "Vue non définie ou fichier manquant.";
    }

    include 'App/Controllers/FooterController.php';
    include $viewF;

} else {
    include 'app/Controllers/ErrorController.php';
    include $viewE;
}
///////////////////////////
?>
