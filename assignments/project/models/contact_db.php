<?php

include_once('database.php');

function get_contact_by_id($contact_id) {
    global $db;
    $query = 'SELECT * FROM contacts
              WHERE contactID = :contact_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":contact_id", $contact_id);
    $statement->execute();
    $contact = $statement->fetch();
    $statement->closeCursor();
    return $contact;
}

function delete_contact($contact_id) {
    global $db;
    $query = 'DELETE FROM contacts
              WHERE contactID = :contact_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':contact_id', $contact_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_contact($userID, $name, $phone, $address, $birthday, $anniversary, $email) {
    global $db;
    $query = 'INSERT INTO contacts
                 (userID, name, phone, address, birthday, anniversary, email)
              VALUES
                 (:userID, :name, :phone, :address, :birthday, :anniversary, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID',        $userID);
    $statement->bindValue(':name',          $name);
    $statement->bindValue(':phone',         $phone);
    $statement->bindValue(':address',       $address);
    $statement->bindValue(':birthday',      $birthday);
    $statement->bindValue(':anniversary',   $anniversary);
    $statement->bindValue(':email',         $email);

    $statement->execute();
    $statement->closeCursor();
}

function get_contacts() {
    global $db;
    $query = 'SELECT * FROM contacts ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
}
