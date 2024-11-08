<?php

echo '

<link rel="stylesheet" href="public/css/topic.css">

<div class="container">
    <h2>Topics</h2>
    <a href="index.php?action=addtopic" class="btn">Ajouter un Topic</a>
    <div class="topics">';
    
foreach (FindAll() as $topic) {
    echo '
        <div class="topic">
            <h3>' . htmlspecialchars($topic['title']) . '</h3>
            <a href="index.php?action=Comments&topic_id=' . htmlspecialchars($topic['topic_id']) . '" class="btn">Voir les commentaires</a>
        </div>';
}

echo '
    </div>
</div>
';

?>
