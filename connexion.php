<?php
session_start(); // Assurez-vous d'avoir cette ligne
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>

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
            <h2 class="title">Connexion</h2>
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
            <a href="forgotpassword.html" style="display: flex">Mot de passe oublié?</a> <a style="display: flex" href="inscription.php">Nouveau ici ? créer un compte</a>
            <input type="submit" class="btn" value="Se connecter">
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const inputs = document.querySelectorAll(".input");
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        inputs.forEach(input => {
            input.addEventListener("focus", () => {
                input.parentNode.parentNode.classList.add("focus");
            });
            input.addEventListener("blur", () => {
                if (input.value === "") {
                    input.parentNode.parentNode.classList.remove("focus");
                }
            });
        });

        togglePassword.addEventListener('mousedown', () => {
            passwordInput.type = 'text';
        });

        togglePassword.addEventListener('mouseup', () => {
            passwordInput.type = 'password';
        });

        togglePassword.addEventListener('mouseout', () => {
            passwordInput.type = 'password';
        });
    });
</script>
<?php include 'footer.php'; ?>

</body>
</html>
