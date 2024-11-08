<?php

echo '

        <link rel="stylesheet" href="public/css/addtopic.css">

        <div class="container">
            <h2>Ajouter un Topic</h2> 
            <form action="index.php?action=AddTopic" method="post">
                <div>
                    <label for="title">Titre:</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <input type="submit" value="Ajouter le Topic">
            </form>
        </div>

';



?>