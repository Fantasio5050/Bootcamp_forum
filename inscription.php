<?php
session_start();
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="inscription.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/62fc2ac293.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    <?php include 'header.php'; ?>

    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/bg.svg">
        </div>
        <div class="login-content">
            <?php
            $error_empty = isset($_SESSION['error_empty']) ? $_SESSION['error_empty'] : false;
            $error_incorrect = isset($_SESSION['error_incorrect']) ? $_SESSION['error_incorrect'] : false;
            session_unset();
            ?>
            <form action="data.php" method="post" id="loginForm">
                <img src="img/avatar.svg">
                <h2 class="title">Inscription</h2>
                <?php if ($error_empty): ?>
                    <div id="error-empty" class="error-message">Indiquez un nom d'utilisateur et un mot de passe</div>
                <?php endif; ?>
                <?php if ($error_incorrect): ?>
                    <div id="error-incorrect" class="error-message">Accès refusé! Identifiant et/ou mot de passe incorrects</div>
                <?php endif; ?>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input" name="email" id="email" required>
                    </div>
                </div>
                <div class="input-div e">
                    <div class="i">
                        <i class="fas fa-solid fa-envelope"></i>
                    </div>

                    <div class="div">
                        <h5>Nom d'utilisateur</h5>
                        <input type="text" class="input" name="username" id="username" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Mot de passe</h5>
                        <input type="password" class="input" name="password" id="password" required>
                        <i class="fas fa-eye eye-icon" id="togglePassword"></i>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirmer votre mot de passe</h5>
                        <input type="password" class="input" name="password_confirmation" id="password_confirmation" required>
                        <i class="fas fa-eye eye-icon" id="togglePassword"></i>
                    </div>
                </div>
                <a href="connexion.php">Vous avez un compte ?</a>
                <input type="submit" class="btn" value="S'inscrire">
            </form>
        </div>
    </div>

    </body>
    <?php include 'footer.php'; ?>
    </html>
