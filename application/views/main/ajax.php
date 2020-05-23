<?
if($_POST['VALUE'] && $_POST['ID'] && $_POST['ACTION'] == 'edit_textarea'){
   Main::upField($_POST['VALUE'], $_POST['ID'], 'task_text');
}
if($_POST['VALUE'] && $_POST['ID'] && $_POST['ACTION'] == 'edit_select'){
   Main::upField($_POST['VALUE'], $_POST['ID'], 'status');
}