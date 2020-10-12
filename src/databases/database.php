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
 * @return array|null
 */
function findUserByEmailOrUsername($dbConnection, $identifier) {
    $query = "SELECT * FROM users WHERE email='{$identifier}' OR username= '{$identifier}'";
    $statement = $dbConnection->prepare($query);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

$dbConnection = connectToDb();
