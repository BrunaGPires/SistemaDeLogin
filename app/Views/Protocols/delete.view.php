<?php
/**
 * @var \App\Entity\Protocol $protocolo
 * @var array @protocolData
 */
?>
<main class="container">
    <h2 class="mt-3">Excluir cadastro</h2>
    <form action="/protocol/delete?id=/<?= $protocolData['id'] ?>" method="post">
        <div class="form-group">
            <p>Deseja exlcuir o cadastro?<strong><?=$obProtocol->description?></strong></p>
        </div>
        <a href="/user/list"><button type="button" class="btn btn-success">Cancelar</button></a>
        <input type="submit" value="Excluir" class="btn btn-danger">
    </form>
</main>