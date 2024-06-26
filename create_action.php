<?php

require './config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$number = filter_input(INPUT_POST, 'number');

if($name && $email && $number) {
    $sql = $pdo->prepare("SELECT  * FROM contatos WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0) {
        $sql = $pdo->prepare("INSERT INTO contatos (name, email, number) VALUES (:name, :email, :number)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':number', $number);
        $sql->execute();

        header('Location: index.php');
        exit;
    } else {
        header('Location: create.php');
        exit;
    }
} else {
    header('Location: create.php');
    exit;
}