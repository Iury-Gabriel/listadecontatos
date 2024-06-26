<?php
require './config.php';

$contatos = [];
$sql = $pdo->query('SELECT * FROM contatos');
if ($sql->rowCount() > 0) {
    $contatos = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<h1>Lista de Contatos</h1>

<a href="create.php">Adicionar Contato</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Ação</th>
    </tr>

    <?php foreach ($contatos as $contato) : ?>
        <tr>
            <td><?= $contato['id'] ?></td></td>
            <td><?= $contato['name'] ?></td></td>
            <td><?= $contato['number'] ?></td></td>
            <td><?= $contato['email'] ?></td></td>

            <td>
                <a href="update.php?id=<?= $contato['id']?>">Editar</a>
                <a href="delete.php?id=<?= $contato['id']?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach ?>
    
</table>
