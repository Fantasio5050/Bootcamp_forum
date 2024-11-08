
<?php
// app/Controllers/CommentsController.php
include 'config/database.php';
$view = 'app/Views/CommentsView.php';

if (isset($_GET['topic_id'])) {
    $topic_id = $_GET['topic_id'];
    $topic_comments = Retrieve($topic_id);
}
 function Create()
    {
        try {
            if (isset($_POST['content']) && isset($_SESSION['user']) && $_SESSION['user']->getId() !== null) {
                $content = $_POST['content'];
                $topicId = $_POST['topic_id'];
                $userId = $_SESSION['user']->getId();
                $req = "INSERT INTO comments(content, created_at, topic_id, user_id) VALUES (:content, :created_at, :topic_id, :user_id)";
                $STMT = $_SESSION['pdo']->prepare($req);
                $STMT->bindParam(':content', $content);
                $STMT->bindParam(':created_at', Date('d/m/Y H:i:s'));
                $STMT->bindParam(':topic_id', $topicId);
                $STMT->bindParam(':user_id', $userId);
                $STMT->execute();
            }else {
                return;
            }
        }catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function Retrieve($commentId)
    {
        $req = "SELECT content, users.username as username, created_at FROM comments JOIN users ON comments.user_id = users.user_id WHERE comments.topic_id = :comment_id";
        $stmt = $_SESSION['pdo']->prepare($req);
        $stmt->bindParam(':comment_id', $commentId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

     function Update()
    {
        $commentId = $_POST['comment_id'];
        $content = $_POST['content'];
        $createdAt = date('Y-m-d H:i:s');
        $topicId = $_POST['topic_id'];
        $userId = $_SESSION['user']->getId();

        $comment = new Comment($commentId, $content, $createdAt, $topicId, $userId);
        $comment->Update();
    }

     function Delete($commentId)
    {
        $comment = new Comment();
        $comment->setCommentId($commentId);
        $comment->setUserId($_SESSION['user']->getId());
        $comment->setTopicId($_POST['topic_id']);
        $comment->Delete();
    }

     function FindAll()
    {
        $req = "SELECT * FROM comments order by created_at desc";
        $stmt = $_SESSION['pdo']->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll();
    }
