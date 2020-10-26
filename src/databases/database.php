<?php

function connectToDb() {
    try {
        $dbConnection = new PDO('mysql:dbname=BookNotes;host=127.0.0.1', 'root', '123');
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $dbConnection;
}

/**
 * @param PDO $dbConnection
 * @param array $data
 */
function insertUser($dbConnection, $data) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO users (username, email, password, created_at) VALUES ('{$data['username']}', '{$data['email']}', '{$data['password']}', '$date')";

    $statement = $dbConnection->prepare($query);
    $statement->execute();
}

/**
 * @param PDO $dbConnection
 * @return array|false
 */
function findUserByEmail($dbConnection, $email) {
    $query = "SELECT * FROM users WHERE email='{$email}'";
    $statement = $dbConnection->prepare($query);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

/**
 * @param PDO $dbConnection
 * @param array $data
 */
function insertNotes($dbConnection, $data) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO notes (id_user, title, author, rate, cover_link, intro, body, created_at) 
        VALUES ('{$data['id_user']}','{$data['title']}','{$data['author']}','{$data['rate']}', '{$data['cover_link']}','{$data['intro']}', '{$data['body']}', '$date')";

    $statement = $dbConnection->prepare($query);
    $statement->execute();
}

function getDataNotesFromDB($dbConnection) {
    $query = "SELECT * FROM notes";
    $statement = $dbConnection->prepare($query);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getUserDataNotesFromDB($dbConnection, $idUser) {
    $query = "SELECT * FROM notes WHERE id_user={$idUser}";
    $statement = $dbConnection->prepare($query);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$dbConnection = connectToDb();
