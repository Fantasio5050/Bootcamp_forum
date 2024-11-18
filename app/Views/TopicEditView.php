<?php
echo '
<link rel="stylesheet" href="public/css/topic.css">
<div class="container">
    <h2>Modifier le Topic</h2>';
    if ($control) {
        echo '
        <form action="index.php?action=topic&def=update&topic_id=' . htmlspecialchars($control->getTopicId()) . '" method="POST">
            <div class="form-group">
                <label for="title">Titre du Topic</label>
                <input type="text" id="title" name="title" value="' . htmlspecialchars($control->getTitle()) . '" required class="form-control">
                <p>'.htmlspecialchars($control->getTopicId()).'</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Mettre à jour</button>
            </div>
        </form>';
    }
    

echo '
</div>';
?>
