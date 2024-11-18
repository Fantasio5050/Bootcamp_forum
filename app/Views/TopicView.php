<?php
echo '
<link rel="stylesheet" href="public/css/topic.css">
<div class="container">
    <h2>Topics</h2>
    <div class="actions">
        <!-- Bouton pour créer un nouveau sujet -->
        <a href="index.php?action=topic&&def=createTopic" class="btn">Ajouter un Topic</a>
    </div>
    <div class="topics">';

// Affichage des sujets
foreach ($control as $topic) {
    echo '
        <div class="topic">
            <h3>' . htmlspecialchars($topic->getTitle()) . '</h3>
            <a href="index.php?action=Comments&topic_id=' . htmlspecialchars($topic->getTopicId()) . '" class="btn">Voir les commentaires</a>';

    if (isset($_SESSION['user']) && $_SESSION['user']['user_id'] === $topic->getUserId()) {
        echo '
            <a href="index.php?action=topic&def=update&topic_id=' . htmlspecialchars($topic->getTopicId()) . '" class="btn">Modifier</a>
            <a href="index.php?action=topic&def=delete&topic_id=' . htmlspecialchars($topic->getTopicId()) . '" class="btn">Supprimer</a>';
    }

    echo '
        </div>';
}

echo '
    </div>
</div>';
?>
