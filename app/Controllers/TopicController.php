<?php

include 'app/Models/TopicModels.php';

class TopicController
{
    private $topicService;

    public function __construct($pdo)
    {
        $this->topicService = new TopicService($pdo);
    }

    public function index() 
    {
        // Récupère tous les sujets
        $topics = $this->topicService->findAll();

        // Assure-toi que les données sont accessibles dans la vue
        global $view;
        $view = 'app/Views/TopicView.php';

        // Retourne les sujets pour qu'ils soient accessibles dans la vue
        return $topics;
    }


    public function createTopic() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && isset($_SESSION['user']) ) {
            $title = $_POST['title'];
            $userId = $_SESSION['user']['user_id'];
            
            // Crée le nouveau topic
            $this->topicService->create(new Topic($title, date("Y-m-d H:i:s"), $userId));

            // Redirection après création
            header("Location: index.php?action=topic");
            exit;
        }

        global $view;
        $view = 'app/Views/AddTopicView.php'; // Défini la vue avant de l'utiliser dans index.php
    }

    // Afficher un topic spécifique
    public function retrieve($topicId)
    {
        // Récupère le topic par son ID
        $topic = $this->topicService->retrieve($topicId);

        global $view;
        $view = 'app/Views/SingleTopicView.php';

        return $topic;
    }

    public function update($topicId)
    {
        // Récupère le topic par son ID
        $topic = $this->topicService->retrieve($topicId);

        // Vérifie si l'utilisateur connecté est bien celui qui a créé le topic
        if ($_SESSION['user']['user_id'] !== $topic->getUserId()) {
            echo "Vous n'avez pas la permission de modifier ce sujet.";
            exit;
        }

        // Vérifie si une modification est faite via le formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
            $title = $_POST['title'];
            $userId = $_SESSION['user']['user_id'];  // Récupérer l'ID de l'utilisateur connecté

            // Crée un objet Topic avec le nouveau titre (sans changer la date de création)
            $topicToUpdate = new Topic($title, $topic->getCreatedAt(), $userId);
            $topicToUpdate->setTopicId($topicId); // Ajoute l'ID du topic

            // Appelle la méthode update en passant l'objet Topic complet
            $this->topicService->update($topicToUpdate);

            // Redirection après la mise à jour pour éviter un resubmission de formulaire
            header("Location: index.php?action=topic&topic_id=" . $topicId);
            exit;
        }

        // Chargement de la vue pour modifier le topic
        global $view;
        $view = 'app/Views/TopicEditView.php';  // La vue pour modifier le topic

        return $topic;
    }

    // Supprimer un topic
    public function delete($topicId)
    {
        // Récupère le topic par son ID
        $topic = $this->topicService->retrieve($topicId);

        // Vérifie si l'utilisateur connecté est bien celui qui a créé le topic
        if ($_SESSION['user']['user_id'] !== $topic->getUserId()) {
            echo "Vous n'avez pas la permission de supprimer ce sujet.";
            exit;
        }

        // Supprime le topic
        $this->topicService->delete($topicId, $_SESSION['user']['user_id']);

        // Redirection après suppression
        header("Location: index.php?action=topic");
        exit;
    }

}
?>
