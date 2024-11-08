<?php
include 'config/database.php';

$view = 'app/Views/AddTopicView.php';

$title = "";
$userId = "";

if (isset($_POST['title']) && isset($_SESSION['user']) && $_SESSION['user']->getId()) {
    $title = $_POST['title'];
    $userId = $_SESSION['user']->getId();
    Create(); 
}

function Create()
{
    try {
        $req = "INSERT INTO topics(title, created_at, user_id) VALUES (:title, :created_at, :user_id)";
        $STMT = $_SESSION['pdo']->prepare($req);
        
        $STMT->bindParam(':title', $title);
        $STMT->bindParam(':created_at', date("Y-m-d H:i:s"));
        $STMT->bindParam(':user_id', $userId);

        $STMT->execute();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        header('Location: index.php?action=error');
    }
}
?>
