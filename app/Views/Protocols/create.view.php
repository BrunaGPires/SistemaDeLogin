<?php
/**
 * @var string $title
 */
 // pega users do banco de dados
$users = \App\Entity\User::getUsers();
?>

<main class="container">
    <h2 class="mt-3"><?=$title?></h2>

    <form action="/protocol/create" method="post">

        <legend>Dados do Protocolo</legend>
            <table cellspacing="10">
                <tr>
                    <td>
                        <label for="description">Descrição: </label>
                    </td>
                    <td align="left">
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="deadline">Prazo: </label>
                    </td>
                    <td align="left">
                        <input type="date" name="deadline">
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
                </tr>
            </table>
            <input type="submit" value="Enviar" class="btn btn-success">
        </form>
</main>