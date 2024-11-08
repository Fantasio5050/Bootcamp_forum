<?php
session_start();
include 'header.php';

// Simuler des commentaires pour un topic (vous pouvez remplacer cela par des données dynamiques si nécessaire)
$topic_id = $_GET['topic_id'];

// Simuler des commentaires
$comments = [
    1 => [
        ['id' => 1, 'content' => 'C\'est un excellent sujet !'],
        ['id' => 2, 'content' => 'Merci pour les ressources.'],
    ],
    2 => [
        ['id' => 3, 'content' => 'J\'aime beaucoup Laravel.'],
    ],
    // Ajoutez d'autres commentaires ici
];

$topic_comments = isset($comments[$topic_id]) ? $comments[$topic_id] : [];
?>

<div class="container">
    <h2>Commentaires pour le Topic ID: <?php echo htmlspecialchars($topic_id); ?></h2>
    <button>Ajouter un commentaire</button>
    <div class="comments">
        <?php if (empty($topic_comments)): ?>
            <p>Aucun commentaire pour ce topic.</p>
        <?php else: ?>
            <?php foreach ($topic_comments as $comment): ?>
                <div class="comment">
                    <p><?php echo htmlspecialchars($comment['content']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <a href="topic.php" class="btn">Retour aux Topics</a>
</div>

<?php
include 'footer.php';
?>