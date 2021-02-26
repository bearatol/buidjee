<h1>User page</h1>

<?php if (!empty($arUser["login"])) { ?>
    <?php
    $only_user_task = true;
    include ROOT . '/templates/components/template_task_list.php';
    ?>

<?php } else { ?>
    Would you like to <a href="/user/?page=auth">login</a>?
<?php } ?>