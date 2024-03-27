<?php
/**
 * @var string $title
 */
?>

<main class="container">
    <h2 class="mt-3"><?=$title?></h2>

    <form action="/user/register" method="post">

        <legend>Dados Pessoais</legend>
            <table cellspacing="10">
                <tr>
                    <td>
                        <label for="name">Nome: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="name" placeholder="Nome Completo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="email" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Senha: </label>
                    </td>
                    <td align="left">
                        <input type="password" name="password" placeholder="Senha">
                    </td>
                </tr>
            </table>
            <input type="submit" value="Enviar" class="btn btn-success">
        </form>
</main>