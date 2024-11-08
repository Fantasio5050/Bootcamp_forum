<?php
session_start(); // ligne importante
include 'header.php';
?>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
    }

    .topics {
        margin-top: 20px;
    }

    .topic {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
        transition: box-shadow 0.3s;
    }

    .topic:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .topic h3 {
        margin: 0 0 10px;
        color: #007bff;
    }

    .topic p {
        color: #555;
    }

    .topic a {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 12px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .topic a:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2>Bienvenue sur le forum Memphis !</h2>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="success-message">
            <?php
            echo htmlspecialchars($_SESSION['success']);
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

    <div class="topics">
        <!-- Exemple de topics statiques -->
        <div class="topic">
            <h3>Topic 1: Comment apprendre PHP ?</h3>
            
            <a href="topic.php?id=1">Lire plus</a>
        </div>

        <div class="topic">
            <h3>Topic 2: Les frameworks PHP populaires</h3>
            
            <a href="topic.php?id=2">Lire plus</a>
        </div>

        <div class="topic">
            <h3>Topic 3: Meilleures pratiques de sécurité en PHP</h3>
            
            <a href="topic.php?id=3">Lire plus</a>
        </div>

        <div class="topic">
            <h3>Topic 4: Sujet...</h3>
            
            <a href="topic.php?id=4">Lire plus</a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>