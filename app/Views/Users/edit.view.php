<?php
/**
 * @var App\Entity\User $user
 * @var array @userData
 */
?>


<main class="container">
    <form action="/user/edit?id=/<?= $userData['id'] ?>" method="post">
        <legend>Dados Pessoais</legend>
            <table cellspacing="10">
                <tr>
                    <td>
                        <label for="name">Nome completo: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="name" value="<?= $userData['name'] ?? '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="birthdate">Nascimento: </label>
                    </td>
                    <td align="left">
                        <input type="date" name="birthdate" value="<?= $userData['birthdate'] ?? '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cpf">CPF: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="cpf" size="15" maxlength="15" value="<?= $userData['cpf'] ?? '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gender">Gênero: </label>
                    </td>
                    <td align="left">
                    <select name="gender">
                        <option value="" hidden>Selecione o gênero</option>
                        <?php
                        $genders = ['Feminino', 'Masculino', 'Não-binário', 'Outro'];
                        foreach ($genders as $gender) {
                            $selected = ($userData['gender'] ?? '') === $gender ? 'selected' : '';
                            echo "<option value=\"$gender\" $selected>$gender</option>";
                        }
                        ?>
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
                        <input type="text" name="city" value="<?= $userData['city'] ?? '' ?>">
                    </td>
                    <td>
                        <label for="neighborhood">Bairro: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="neighborhood" value="<?= $userData['neighborhood']?? '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="street">Rua: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="street" value="<?= $userData['street'] ?? '' ?>">
                    </td>
                    <td>
                        <label for="house_number">Numero: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="house_number" size="4" value="<?= $userData['house_number'] ?? '' ?>">
                    </td>
                    <td>
                        <label for="complement">Complemento: </label>
                    </td>
                    <td align="left">
                        <input type="text" name="complement" value="<?= $userData['complement'] ?? '' ?>">
                    </td>
                </tr>
            </table>
            <a href="/user/list"><button type="button" class="btn btn-primary">Cancelar</button></a>
            <input type="submit" value="Salvar" class="btn btn-success">
        </form>
</main>