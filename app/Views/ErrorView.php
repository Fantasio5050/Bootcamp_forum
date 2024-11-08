<?php
echo '
        <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    font-family: \'Poppins\', sans-serif;
                    background-color: #f8f8f8;
                }

                .error-container {
                    text-align: center;
                    max-width: 600px;
                    padding: 20px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                    background-color: #ffffff;
                }

                .error-image img {
                    width: 380px;
                    margin-bottom: 20px;
                }

                h1 {
                    font-size: 2rem;
                    color: #333333;
                    margin-bottom: 10px;
                }

                p {
                    color: #666666;
                    font-size: 1rem;
                    margin-bottom: 30px;
                }

                button {
                    padding: 12px 20px;
                    font-size: 1rem;
                    color: #ffffff;
                    background-color: #38d39f;
                    border: none;
                    border-radius: 25px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                button:hover {
                    background-color: #32be8f;
                }

                @media (max-width: 600px) {
                    .error-container {
                        padding: 15px;
                    }

                    h1 {
                        font-size: 1.8rem;
                    }

                    p {
                        font-size: 0.9rem;
                    }

                    button {
                        font-size: 0.9rem;
                        padding: 10px 18px;
                    }
                }


        </style>
        <div class="error-container">
            <div class="error-image">
                <img src="public/img/error.avif" alt="Personnage perdu">
            </div>
            <h1>Oups! Une erreur inattendue s\'est produite.</h1>
            <p>Il semble que quelque chose n\'ait pas fonctionné correctement. La page que vous recherchez est introuvable ou a rencontré une erreur.</p>
            <button onclick="window.history.back()">Retourner à la page précédente</button>
        </div>
    ';

?>

