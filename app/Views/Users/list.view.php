<?php
/**
 * @var array $users
 */
?>

<div class="container">
    <div class="row justify-content-center">
        <p>Olá 
            <?php
                foreach($users as $user){}
            ?>
            <?= $user['name'] ?>
        </p> 
        <p>Você se conectou com sucesso!</p>
    </div>
    
    <tbody class="container">
        <td>
            <a href="/user/logout" class="btn btn-danger">Sair</a>
        </td>
    </tbody>
</div>