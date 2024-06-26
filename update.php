<?php 

require 'config.php';

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $sql = $pdo->prepare("SELECT * FROM contatos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $contato = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

?>

<h1>Editar Contato</h1>

<form action="update_action.php" method="POST">

    <input type="hidden" name="id" value="<?= $contato['id'] ?>">

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= $contato['name'] ?>">

    <br>

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?= $contato['email'] ?>">

    <br>

    <label for="number">Número</label>
    <input type="text" name="number" id="number" value="<?= $contato['number'] ?>">

    <br>

    <input type="submit" value="Atualizar">
</form>