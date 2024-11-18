<?php

class Topic
{
    private $topicId;
    private $title;
    private $createdAt;
    private $userId;

    public function __construct($title = null, $createdAt = null, $userId = null)
    {
        $this->title = $title;
        $this->createdAt = $createdAt ?? date("Y-m-d H:i:s");
        $this->userId = $userId;
    }

    // Getters
    public function getTopicId() { return $this->topicId; }
    public function getTitle() { return $this->title; }
    public function getCreatedAt() { return $this->createdAt; }
    public function getUserId() { return $this->userId; }

    // Setters
    public function setTopicId($topicId) { $this->topicId = $topicId; }
    public function setTitle($title) { $this->title = $title; }
    public function setCreatedAt($createdAt) { $this->createdAt = $createdAt; }
    public function setUserId($userId) { $this->userId = $userId; }

    // Méthodes pour peupler l'entité depuis ou vers un tableau de données
    public function fromArray(array $data)
    {
        $this->topicId = $data['topic_id'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->createdAt = $data['created_at'] ?? null;
        $this->userId = $data['user_id'] ?? null;
    }

    public function toArray()
    {
        return [
            'topic_id' => $this->topicId,
            'title' => $this->title,
            'created_at' => $this->createdAt,
            'user_id' => $this->userId,
        ];
    }
}
