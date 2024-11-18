<?php

    echo '
        <link rel="stylesheet" href="public/css/inscription.css">

        <img class="wave" src="public/img/wave.png">
        <div class="container">
            <div class="img">
                <img src="public/img/bg.svg">
            </div>
            <div class="login-content">
                <form action="index.php?action=User&&def=register" method="post" id="loginForm">
                    <img src="public/img/avatar.svg">
                    <h2 class="title">Inscription</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Nom d\'utilisateur</h5>
                            <input type="text" class="input" name="username" id="username" required>
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-solid fa-envelope fa-beat"></i>
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
                    <p style="display: flex; font-size: 14px; justify-content: center; margin-top: 1rem">Déjà inscrit ?&emsp;<a href="index.php?action=login">se connecter</a></p>
                    <input type="submit" class="btn" value="Créer un compte">
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