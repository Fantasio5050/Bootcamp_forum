<?php

//session_start();

class Topic
{
    private $topicId;
    private $title;
    private $createdAt;
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
            case 4:
                $args_list = func_get_args();
                $this->topicId = $args_list[0];
                $this->title = $args_list[1];
                $this->createdAt = $args_list[2];
                $this->userId = $args_list[3];
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
        }
    }

    public function getCommentId(){return $this->topicId;}
    public function getContent(){return $this->title;}
    public function getCreatedAt(){return $this->createdAt;}
    public function getUserId(){return $this->userId;}

    public function setTopicId($topicId){$this->topicId = $topicId;}
    public function setContent($title){$this->title = $title;}
    public function setCreatedAt($createdAt){$this->createdAt = $createdAt;}
    public function setUserId($userId){$this->userId = $userId;}

    function Create()
    {
        $sqlenvoie= "INSERT INTO topics(title, created_at, user_id) VALUES (:title, :created_at, :user_id)";
        $STMT= $this->PDO->prepare($sqlenvoie);
        $STMT->bindParam(':title', $this->title);
        $STMT->bindParam(':created_at', $this->createdAt);
        $STMT->bindParam(':user_id', $this->userId);
        $STMT->execute();
    }

    function Retrieve($topicId)
    {
        $req = "SELECT * FROM topics WHERE topic_id = :topicId";
        $stmt= $this->PDO->prepare($req);
        $stmt->bindParam(':topicId', $topicId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function Update()
    {
        $req = "UPDATE topics SET title = :title, created_at = :createdAt WHERE user_id = :userId AND topic_id = :topicId";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':title', $this->title);
        $STMT->bindParam(':createdAt', $this->createdAt);
        $STMT->bindParam(':userId', $this->userId);
        $STMT->bindParam(':topicId', $this->topicId);
        $STMT->execute();
    }

    function Delete()
    {
        $req = "DELETE FROM topics WHERE topic_id = :topicId AND user_id = :userId";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':userId', $this->userId);
        $STMT->bindParam(':topicId', $this->topicId);
        $STMT->execute();
    }

    function FindAll()
    {
        $req = "SELECT * FROM topics";
        $STMT = $this->PDO->prepare($req);
        $STMT->execute();
        $result = $STMT->fetchAll();
        //$_SESSION['findAll'] = $result;
        return $result;
    }
}
?>