<?php
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Topic</title>
    <link rel="stylesheet" type="text/css" href="add_topic.css"> <!-- Inclure le fichier CSS -->
</head>
<body>


<div class="container">
    <h2>Ajouter un Topic</h2>
    <form action="save_topic.php" method="post">
        <div>
            <label for="title">Titre:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">Contenu:</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <input type="submit" value="Ajouter le Topic">
    </form>
</div>

<?php
include 'footer.php';
?>