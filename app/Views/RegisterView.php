<?php



    echo '
        <link rel="stylesheet" href="public/css/inscription.css">

        <img class="wave" src="public/img/wave.png">
        <div class="container">
            <div class="img">
                <img src="public/img/bg.svg">
            </div>
            <div class="login-content">
                <?php
                session_start();
                $error_empty = isset($_SESSION[\'error_empty\']) ? $_SESSION[\'error_empty\'] : false;
                $error_incorrect = isset($_SESSION[\'error_incorrect\']) ? $_SESSION[\'error_incorrect\'] : false;
                session_unset();
                ?>
                <form action="data.php" method="post" id="loginForm">
                    <img src="public/img/avatar.svg">
                    <h2 class="title">Inscription</h2>
                    <?php if ($error_empty): ?>
                        <div id="error-empty" class="error-message">Indiquez un nom d\'utilisateur, un mail et un mot de passe</div>
                
                    <?php if ($error_incorrect): ?>
                        <div id="error-incorrect" class="error-message">Accès refusé! Identifiant et/ou mot de passe incorrects</div>
                    <?php endif; ?>


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




                    <a href="connexion.php">Déjà inscrit? connectez vous</a>
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