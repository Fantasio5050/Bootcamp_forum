<?php

//session_start();

class Comments
{
    private $commentId;
    private $content;
    private $createdAt;
    private $topicId;
    private $userId;
    private $PDO;

    function __construct()
    {
        $args_num = func_num_args();

        switch ($args_num)
        {
            case 0:
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
            case 5:
                $args_list = func_get_args();
                $this->commentId = $args_list[0];
                $this->content = $args_list[1];
                $this->createdAt = $args_list[2];
                $this->topicId = $args_list[3];
                $this->userId = $args_list[4];
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
        }
    }

    public function getCommentId(){return $this->commentId;}
    public function getContent(){return $this->content;}
    public function getCreatedAt(){return $this->createdAt;}
    public function getTopicId(){return $this->topicId;}
    public function getUserId(){return $this->userId;}

    public function setCommentId($commentId){$this->commentId = $commentId;}
    public function setContent($content){$this->content = $content;}
    public function setCreatedAt($createdAt){$this->createdAt = $createdAt;}
    public function setTopicId($topicId){$this->topicId = $topicId;}
    public function setUserId($userId){$this->userId = $userId;}

    function Create()
    {
        $sqlenvoie= "INSERT INTO comments(content, created_at, topic_id, user_id) VALUES (:content, :created_at, :topic_id, :user_id)";
        $STMT= $this->PDO->prepare($sqlenvoie);
        $STMT->bindParam(':content', $this->content);
        $STMT->bindParam(':created_at', $this->createdAt);
        $STMT->bindParam(':topic_id', $this->topicId);
        $STMT->bindParam(':user_id', $this->userId);
        $STMT->execute();
    }

    function Retrieve($commentId)
    {
        $req = "SELECT * FROM comments WHERE comment_id = :commentId";
        $stmt= $this->PDO->prepare($req);
        $stmt->bindParam(':commentId', $commentId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function Update()
    {
        $req = "UPDATE comments SET content = :content, created_at = :createdAt WHERE comment_id = :commentId AND user_id = :userId AND topic_id = :topicId";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':content', $this->content);
        $STMT->bindParam(':createdAt', $this->createdAt);
        $STMT->bindParam(':comment_id', $this->commentId);
        $STMT->bindParam(':userId', $this->userId);
        $STMT->bindParam(':topicId', $this->topicId);
        $STMT->execute();
    }

    function delete()
    {
        $req = "DELETE FROM comments WHERE comment_id = :commentId AND user_id = :userId AND topic_id = :topicId";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':commentId', $this->commentId);
        $STMT->bindParam(':userId', $this->userId);
        $STMT->bindParam(':topicId', $this->topicId);
        $STMT->execute();
    }

    function findAll()
    {
        $req = "SELECT * FROM comments WHERE topic_id = :topicId";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':topicId', $this->topicId);
        $STMT->execute();
        $result = $STMT->fetchAll();
        //$_SESSION['findAll'] = $result;
        return $result;
    }
}
?>