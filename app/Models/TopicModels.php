<?php
include 'app/Entity/Topic.php';

class TopicService
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Topic $topic)
    {
        $req = "INSERT INTO topics (title, created_at, user_id) VALUES (:title, :created_at, :user_id)";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':title', $topic->getTitle());
        $stmt->bindParam(':created_at', $topic->getCreatedAt());
        $stmt->bindParam(':user_id', $topic->getUserId());
        $stmt->execute();
        
        $topic->setTopicId($this->pdo->lastInsertId());
    }

    public function retrieve($topicId)
    {
        $req = "SELECT * FROM topics WHERE topic_id = :topicId";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':topicId', $topicId);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $topic = new Topic();
            $topic->fromArray($data);
            return $topic;
        }
        return null;
    }

    public function update(Topic $topic)
    {
        // Mise à jour uniquement du titre, en ne modifiant pas la date de création
        $req = "UPDATE topics SET title = :title WHERE user_id = :user_id AND topic_id = :topic_id";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':title', $topic->getTitle());
        $stmt->bindParam(':user_id', $topic->getUserId());
        $stmt->bindParam(':topic_id', $topic->getTopicId());
        $stmt->execute();
    }

    public function delete($topicId, $userId)
    {
        $req = "DELETE FROM topics WHERE topic_id = :topicId AND user_id = :userId";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':topicId', $topicId);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    public function findAll()
    {
        $req = "SELECT * FROM topics";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $topics = [];
        foreach ($results as $data) {
            $topic = new Topic();
            $topic->fromArray($data);
            $topics[] = $topic;
        }
        return $topics;
    }
}
