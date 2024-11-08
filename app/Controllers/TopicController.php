<?php
include 'config/database.php';
$view = 'app/Views/TopicView.php';

function Create()
{
    if (isset($_POST['title']) && isset($_SESSION['user']) && $_SESSION['user']->getId()) {
        $title = $_POST['title'];
        $userId = $_SESSION['user']->getId();

        $req = "INSERT INTO topics(title, created_at, user_id) VALUES (:title, :created_at, :user_id)";
        $STMT = $_SESSION['pdo']->prepare($req);
        $STMT->bindParam(':title', $title);
        $STMT->bindParam(':created_at', date("d/m/Y H:i:s"));
        $STMT->bindParam(':user_id', $userId);
        $STMT->execute();
    }
}

function Retrieve($topicId)
{
    $req = "SELECT * FROM topics WHERE topic_id = :topicId";
    $stmt = $_SESSION['pdo']->prepare($req);
    $stmt->bindParam(':topicId', $topicId);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function Update($topicId)
{
    if (isset($_POST['title']) && isset($_SESSION['user']) && $_SESSION['user']->getId()) {
        $title = $_POST['title'];
        $createdAt = $_POST['createdAt'];
        $userId = $_SESSION['user']->getId();

        $req = "UPDATE topics SET title = :title, created_at = :createdAt WHERE user_id = :userId AND topic_id = :topicId";
        $STMT = $_SESSION['pdo']->prepare($req);
        $STMT->bindParam(':title', $title);
        $STMT->bindParam(':createdAt', date("d/m/Y H:i:s"));
        $STMT->bindParam(':userId', $userId);
        $STMT->bindParam(':topicId', $topicId);
        $STMT->execute();
    }
}

function Delete($topicId)
{
    if (isset($_SESSION['user']) && $_SESSION['user']->getId()) {
        $userId = $_SESSION['user']->getId();

        $req = "DELETE FROM topics WHERE topic_id = :topicId AND user_id = :userId";
        $STMT = $_SESSION['pdo']->prepare($req);
        $STMT->bindParam(':userId', $userId);
        $STMT->bindParam(':topicId', $topicId);
        $STMT->execute();
    }
}

function FindAll()
{
    $req = "SELECT * FROM topics";
    $STMT = $_SESSION['pdo']->prepare($req);
    $STMT->execute();
    $result = $STMT->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
