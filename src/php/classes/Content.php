<?php
require_once './src/php/classes/Bdd.php';

class Content extends Bdd
{
    public function __construct()
    {
        parent::__construct('./config/env.php');
    }

    public function getContent()
    {
        $sql = 'SELECT * FROM content';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        return $result;
    }

    public function updateContent($data)
    {
        $sql = 'UPDATE content SET title = :title, text = :text WHERE id = :id';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->bindParam('title', $data['title']);
            $statement->bindParam('text', $data['text']);
            $statement->bindParam('id', $data['id']);
            $statement->execute();
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        return $statement->rowCount();
    }

    public function insertContent($data)
    {
        $sql = 'INSERT INTO content (title, text) VALUES(:title, :text)';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->bindParam('title', $data['title']);
            $statement->bindParam('text', $data['text']);
            $statement->execute();
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        return $this->getConnection()->lastInsertId();
    }

    public function deleteContent($id)
    {
        $sql = 'DELETE FROM content WHERE id = :id';

        try {
            $statement = $this->getConnection()->prepare($sql);
            $statement->bindParam('id', $id);
            $statement->execute();
        } catch (PDOException $exception) {
            var_dump($exception);
            exit;
        }

        return $statement->rowCount();
    }
}
