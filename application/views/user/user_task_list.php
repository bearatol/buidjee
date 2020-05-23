<h1>User page</h1>

<?
if (!empty($arUser["login"])) { ?>
   <?
   $only_user_task = true;
   include ROOT . '/templates/components/template_task_list.php';
   ?>

<? } else { ?>
   Would you like to <a href="/user/?page=auth">login</a>?
<? } ?>