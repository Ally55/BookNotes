<?php


namespace BookNotes\Core\Database;


class QueryBuilder
{
    protected $pdo;
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insertUser($data) {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO users (username, email, password, created_at) VALUES ('{$data['username']}', '{$data['email']}', '{$data['password']}', '$date')";

        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email='{$email}'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function insertNotes($data) {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO notes (id_user, title, author, rate, cover_link, intro, body, created_at) 
        VALUES ('{$data['id_user']}','{$data['title']}','{$data['author']}','{$data['rate']}', '{$data['cover_link']}','{$data['intro']}', '{$data['body']}', '$date')";

        $statement = $this->pdo->prepare($query);
        $statement->execute();
    }

    public function getDataNotesFromDB() {
        $query = "SELECT * FROM notes";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDataNoteById($id)
    {
        $query = "SELECT * FROM notes WHERE id={$id}";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUserDataNotesFromDB($idUser) {
        $query = "SELECT * FROM notes WHERE id_user={$idUser}";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}

