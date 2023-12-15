<?php
/**
 * @var array $users
 * 
 */
?>

<div class="container">
    var_dump($users)
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">CPF</th>
            <th scope="col">Genero</th>
            <th scope="col">Cidade</th>
            <th scope="col">Bairro</th>
            <th scope="col">Rua</th>
            <th scope="col">Numero</th>
            <th scope="col">Complemento</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user['name'] ?> </td>
                <td><?= date('d/m/Y', strtotime($user['birthdate'])) ?> </td>
                <td><?= $user['cpf'] ?> </td>
                <td><?= $user['gender'] ?> </td>s
                <td><?= $user['city'] ?> </td>
                <td><?= $user['neighborhood'] ?> </td>
                <td><?= $user['street'] ?> </td>
                <td><?= $user['house_number'] ?> </td>
                <td><?= $user['complement'] ?> </td>
                <td>
                    <a href="/user/edit?id=/<?= $user['id'] ?>" class="btn btn-primary">Editar</a>
                </td>
                <td>
                    <a href="/user/delete?id=/<?= $user['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <tbody class="container">
        <td>
            <a href="/user/create" class="btn btn-success">Cadastrar novo contribuinte</a>
        </td>
    </tbody>
</div>