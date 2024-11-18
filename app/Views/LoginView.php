<?php
echo '
    <link rel="stylesheet" href="public/css/connexion.css">
    <img class="wave" src="public/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="public/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="index.php?action=User&&def=login" method="post" id="loginForm">
                <img src="public/img/avatar.svg">
                <h2 class="title">Connexion</h2>';
echo '
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" name="email" id="email" required>
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
                <a href="forgotpassword.html" style="display: flex">Mot de passe oublié?</a> 
                <a style="display: flex" href="inscription.php">Nouveau ici? Créer un compte</a>
                <input type="submit" class="btn" value="Se connecter">
            </form>
        </div>
    </div>
    <script>
        document.addEventListener(\'DOMContentLoaded\', (event) => {
            const inputs = document.querySelectorAll(".input");
            const passwordInput = document.getElementById(\'password\');
            const togglePassword = document.getElementById(\'togglePassword\');

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

            togglePassword.addEventListener(\'mousedown\', () => {
                passwordInput.type = \'text\';
            });

            togglePassword.addEventListener(\'mouseup\', () => {
                passwordInput.type = \'password\';
            });

            togglePassword.addEventListener(\'mouseout\', () => {
                passwordInput.type = \'password\';
            });
        });
    </script>
';
?>
