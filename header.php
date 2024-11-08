<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #38d39f;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }

        #memphis {
            padding-left: 600px;
            font-size: 20px;

        }


    </style>
</head>
<body>
<nav>
    <div>
        <a href="accueil.php">Accueil</a>
       
    </div>
    <div class="nav-links">
        <?php if(isset($_SESSION['username'])): ?>
            <span>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="deconnexion.php">Déconnexion</a>
        <?php else: ?>
            <a href="inscription.php">Inscription</a>
            <a href="connexion.php">Connexion</a>
        <?php endif; ?>
    </div>
</nav>