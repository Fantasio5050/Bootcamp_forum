<?php
// headerView.php

echo '
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/public/css/hnf.css">
        <script src="https://kit.fontawesome.com/a81368914c.js" crossorigin="anonymous"></script>
        <title>Memphis Forum</title>
        <style>
            body {
                font-family: \'Arial\', sans-serif;
                margin: 0;
                padding: 0;
            }
            nav {
                background-color: #38d39f;
                color: white;
                padding: 10px;
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
            
            a{
                color: #999;
                font-size: 0.9rem;
                transition: .3s;
            }
            
            a:hover{
                color: #17664b;
            }
        </style>
    </head>
    <body>
    <nav>
        <div>
            <a href="index.php?action=topic">Accueil</a>
        </div>
        <div class="nav-links">
            <?php if(isset($_SESSION[\'username\'])): ?>
                <span><?php echo htmlspecialchars($_SESSION[\'username\']); ?></span>
                <a href="index.php?action=User&&def=logout">Déconnexion</a>
            <?php else: ?>
                <a href="index.php?action=User&&def=register">Inscription</a>
                <a href="index.php?action=User&&def=login">Connexion</a>
            <?php endif; ?>
        </div>
    </nav>
    ';
?>
