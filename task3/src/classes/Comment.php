<?php

namespace task3\Classes;

class Comment extends DataBase
{
    public $id;
    public $text;
    public $date_create;

    public function save()
    {
        $stmt = $this->conn->prepare('INSERT INTO comments(`text`) VALUES(:text)');
        $stmt->execute(array('user_id' => $this->userId, 'comment' => $this->comment));
        $this->id = $this->conn->lastInsertId();
        return $this->id;
    }

    public function findAll()
    {
        $stmt = $this->conn->prepare('SELECT * FROM comments ORDER BY id DESC');
        $stmt->execute();
        $comments = [];
        while ($row = $stmt->fetch(\PDO::FETCH_LAZY)) {
            $comments[] = ['id' => $row->id, 'user_id' => $row->user_id, 'comment' => $row->comment, 'created_at' => $row->created_at];
        }
        return $comments;
    }
}