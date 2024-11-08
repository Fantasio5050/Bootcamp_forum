<?php

//session_start();

class Topic
{
    private $topicId;
    private $title;
    private $createdAt;
    private $userId;

    public function __construct($title, $createdAt, $userId){
        $this->title = $title;
        $this->createdAt = $createdAt;
        $this->userId = $userId;
    }

    public function getCommentId(){return $this->topicId;}
    public function getContent(){return $this->title;}
    public function getCreatedAt(){return $this->createdAt;}
    public function getUserId(){return $this->userId;}

    public function setTopicId($topicId){$this->topicId = $topicId;}
    public function setContent($title){$this->title = $title;}
    public function setCreatedAt($createdAt){$this->createdAt = $createdAt;}
    public function setUserId($userId){$this->userId = $userId;}
}
?>