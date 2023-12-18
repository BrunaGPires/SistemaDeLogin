<?php
/**
 * @var string $title
 */
?>

<main class="container">
    <h2 class="mt-3"><?=$title?></h2>

    <form action="/user/create" method="post">

        <legend>Dados Pessoais</legend>
            <table cellspacing="10">
                <tr>
                    <td>
                        <label for="name">Nome completo: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="birthdate">Nascimento: </label>
                    </td>
                    <td align="left">
                        <input type="date" name="birthdate">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cpf">CPF: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="cpf" size="15" maxlength="15">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gender">Gênero: </label>
                    </td>
                    <td align="left">
                        <select name="gender">
                            <option value="" hidden>Selecione o gênero</option>
                            <option value="Feminino">Feminino</option> 
                            <option value="Masculino">Masculino</option>
                            <option value="Não-binário">Não-binário</option>
                            <option value="NA">Outro</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br />
            <legend>Endereço</legend>
            <table cellspacing="10">
                <tr>
                    <td>
                        <label for="city">Cidade: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="city">
                    </td>
                    <td>
                        <label for="neighborhood">Bairro: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="neighborhood">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="street">Rua: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="street">
                    </td>
                    <td>
                        <label for="houseNumber">Numero: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="house_number" size="4">
                    </td>
                    <td>
                        <label for="complement">Complemento: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="complement">
                    </td>
                </tr>
            </table>
            <input type="submit" value="Enviar" class="btn btn-success">
        </form>
</main>