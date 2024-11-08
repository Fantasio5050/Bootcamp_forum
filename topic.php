
<!DOCTYPE html>
<html>
<head>
    <title>Topics</title>
    <link rel="stylesheet" type="text/css" href="topic.css"> <!-- Inclure le fichier CSS -->
</head>
<body>





<?php
session_start(); // Assurez-vous d'avoir cette ligne
include 'header.php';


// Simuler des topics (vous pouvez remplacer cela par des données dynamiques si nécessaire)
$topics = [
    ['id' => 1, 'title' => 'Comment apprendre PHP ?', 'content' => 'Dans ce topic, nous discuterons des meilleures ressources pour apprendre PHP.'],
    ['id' => 2, 'title' => 'Les frameworks PHP populaires', 'content' => 'Découvrez les frameworks PHP les plus utilisés en 2023.'],
    ['id' => 3, 'title' => 'Meilleures pratiques de sécurité en PHP', 'content' => 'Apprenez à sécuriser vos applications PHP contre les attaques courantes.'],
    ['id' => 4, 'title' => 'Questions fréquentes sur PHP', 'content' => 'Une compilation des questions les plus posées sur PHP par les débutants.'],
];
?>



<div class="container">
    <h2>Topics</h2>
    <a href="add_topic.php" class="btn">Ajouter un Topic</a>
    <div class="topics">
        <?php foreach ($topics as $topic): ?>
            <div class="topic">
                <h3><?php echo htmlspecialchars($topic['title']); ?></h3>
                <p><?php echo htmlspecialchars($topic['content']); ?></p>
                <a href="comments.php?topic_id=<?php echo $topic['id']; ?>" class="btn">Voir les commentaires</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include 'footer.php';
?>