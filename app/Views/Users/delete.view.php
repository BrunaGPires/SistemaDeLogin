<?php
/**
 * @var \App\Entity\User $user
 * @var array @userData
 */
?>
<main class="container">
    <h2 class="mt-3">Excluir cadastro</h2>
    <form action="/user/delete?id=/<?= $userData['id'] ?>" method="post">
        <div class="form-group">
            <p>Deseja exlcuir o cadastro?<strong><?=$obUser->name?></strong></p>
        </div>
        <a href="/user/list"><button type="button" class="btn btn-success">Cancelar</button></a>
        <input type="submit" value="Excluir" class="btn btn-danger">
    </form>
</main>