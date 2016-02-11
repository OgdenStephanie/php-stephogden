<?php

include_once('database.php');

function get_user_by_id($user_id) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE userID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function delete_user($user_id) {
    global $db;
    $query = 'DELETE FROM users
              WHERE userID = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_user($username, $password) {
    global $db;
    $query = 'INSERT INTO users
                 (username, password)
              VALUES
                 (:username, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function get_users() {
    global $db;
    $query = 'SELECT * FROM users ORDER BY username';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
