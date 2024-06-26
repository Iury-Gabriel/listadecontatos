<?php 

require './config.php';

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$number = filter_input(INPUT_POST, 'number');

if($id && $name && $email && $number){
    $sql = $pdo->prepare("UPDATE contatos SET name = :name, email = :email, number = :number WHERE id = :id");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':number', $number);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}

?>