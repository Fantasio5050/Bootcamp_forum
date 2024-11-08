<?php

class Comment
{
    private $commentId;
    private $content;
    private $createdAt;
    private $topicId;
    private $userId;

    function __construct($content, $topicId , $userId)
    {
        $this->content = $content;
        $this->createdAt = Date('d/m/Y H:i:s');
        $this->topicId = $topicId;
        $this->userId = $userId;

    }

    public function getCommentId(): int{return $this->commentId;}
    public function getContent(): string{return $this->content;}
    public function getCreatedAt(): string{return $this->createdAt;}
    public function getTopicId(): int{return $this->topicId;}
    public function getUserId(): int{return $this->userId;}

    public function setCommentId($commentId): void{$this->commentId = $commentId;}
    public function setContent($content): void{$this->content = $content;}
    public function setCreatedAt($createdAt): void{$this->createdAt = $createdAt;}
    public function setTopicId($topicId): void{$this->topicId = $topicId;}
    public function setUserId($userId): void{$this->userId = $userId;}

}
