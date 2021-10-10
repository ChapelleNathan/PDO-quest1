<?php
require_once '_connect.php';
$pdo = new \PDO(DSN, USER, PASS);
$data = array_map('trim', $_POST);
$data = array_map('htmlentities', $data);
$errors = [];
if(!empty($data)) {
    if(empty($data['firstname'])) {
        $errors['noFirstname'] = 'Le prénom doit être remplis';
    }

    if(strlen($data['firstname']) >= 45) {
        $errors['longFirstname'] = 'Le prénom doit faire moins de 45 charactères';
    }

    if(empty($data['lastname'])) {
        $errors['noLastname'] = 'Le nom doit être remplis';
    }

    if(strlen($data['lastname']) >= 45) {
        $errors['longLastname'] = 'Le nom doit faire moins de 45 charactères';
    }

    if(empty($errors)) {
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];

        $query = 'INSERT INTO  friend (firstname, lastname) VALUES(:firstname, :lastname)';
        $statement = $pdo->prepare($query);

        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

        $statement->execute();
        
        header('Location: index.php');
    }
}