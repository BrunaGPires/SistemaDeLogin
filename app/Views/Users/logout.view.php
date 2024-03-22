<?php
/**
 * @var array $users
 */
?>

<div class="container">
<?php
        foreach ($users as $user) {
            ?>
            <p>Valeu falou,'nome'</p>
            <?= $user['name'] ?>
            <p>!</p>
            <?php
        }
        ?>
</div>