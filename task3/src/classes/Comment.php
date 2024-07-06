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
        $stmt->execute([
            'text' => $this->text
        ]);
        $this->id = $this->conn->lastInsertId();
        return $this->id;
    }

    public function getlist()
    {
        $stmt = $this->conn->prepare('SELECT * FROM comments ORDER BY id DESC');
        $stmt->execute();
        $comments = [];
        while ($row = $stmt->fetch(\PDO::FETCH_LAZY)) {
            $comments[] = [
                'id' => $row->id, 
                'text' => $row->text, 
                'date_create' => $row->date_create
            ];
        }
        return $comments;
    }
}