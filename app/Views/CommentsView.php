<?php

echo '

<link rel="stylesheet" href="public/css/comments.css">
<div class="container">
    <h2>Commentaires pour le Topic </h2>
    <div class="comments">';
            foreach ($topic_comments as $comment){
            echo '
                <div class="comment">
                    <h1>' .$comment['username'].'</h1>
                    <p>' .$comment['content'].'</p>
                    <p> date de publication: ' .$comment['created_at'].'</p>
                </div> ';
            }
echo '
    </div>
    <a href="index.php?action=topic" class="btn">Retour aux Topics</a>
</div>';



?>