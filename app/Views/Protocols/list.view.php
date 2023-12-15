<?php
/**
 * @var array $users
 */
?>
<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Numero</th>
            <th scope="col">Descrição</th>
            <th scope="col">Aberto</th>
            <th scope="col">Prazo</th>
            <th scope="col">Contribuinte</th>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($protocols as $protocol) {
            ?>
                <tr>
                    <td><?= $protocol['id'] ?> </td>
                    <td><?= $protocol['description'] ?> </td>
                    <td><?= date('d/m/Y', strtotime($protocol['createdAt'])) ?> </td>
                    <td><?= date('d/m/Y', strtotime($protocol['deadline'])) ?> </td>
                    <td><?= isset($protocol['user_name']) ? $protocol['user_name'] : 'Usuário não encontrado' ?></td>
                    <td>
                        <a href="/protocol/edit?id=<?= $protocol['id'] ?>" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
                <?php
                }
                ?>
        </tbody class="container">
    </table>
    <tbody>
        <td>
            <a href="/protocol/create" class="btn btn-success">Registrar novo protocolo</a>
        </td>
    </tbody>
</div>