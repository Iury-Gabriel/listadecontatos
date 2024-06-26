<?php 

require './config.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if($id) {
    $sql = $pdo->prepare("DELETE FROM contatos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}

