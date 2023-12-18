<?php
/**
 * @var App\Entity\Protocol $protocol
 * @var array $users
 * @var array @protocolData
 */
$users = \App\Entity\User::getUsers();
?>

<main class="container">

    <form action="/protocol/edit?id=/<?= $protocolData['id'] ?>" method="post">

        <legend>Dados do Protocolo</legend>
        <table cellspacing="10">
            <tr>
                <td>
                    <label for="description">Descrição: </label>
                </td>
                <td align="left">
                    <textarea class="form-control" id="exampleTextarea" rows="3" name="description"><?= $protocolData['description'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="deadline">Prazo: </label>
                </td>
                <td align="left">
                    <input type="date" name="deadline" value="<?= $protocolData['deadline'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="user_id">Contribuinte: </label>
                </td>
                <td align="left">
                <select name="user_id">
                            <?php 
                                foreach ($users as $user) {
                                    echo "<option value=\"{$user->id}\">{$user->name}</option>";
                                }
                            ?>
                        </select>
                    </td>
                </td>
            </tr>
        </table>
        <a href="/protocol/list"><button type="button" class="btn btn-primary">Cancelar</button></a>
        <input type="submit" value="Salvar" class="btn btn-success">
    </form>
</main>
