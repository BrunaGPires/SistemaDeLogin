<?php
/**
 * @var \App\Entity\User $user
 * @var array $userData 
 */
?>
<main class="container">
    <h2 class="mt-3">Excluir cadastro</h2>
    <form form action="/user/edit?id=<?= $userData['id'] ?>" method="post">
        <div class="form-group">
            <p>Deseja exlcuir o cadastro?<strong><?=$obUser->name?></strong></p>
        </div>
        <div class="from-group">   
            <a href="/user/list"><button type="button" class="btn btn-success">Cancelar</button></a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>