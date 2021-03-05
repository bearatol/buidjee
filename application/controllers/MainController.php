<?php

use View\View;


include_once ROOT . '/application/models/Main.php';


class MainController extends View
{

    public function __construct()
    {
        if ($_POST['VALUE'] && $_POST['ID'] && $_POST['ACTION'] == 'edit_textarea') {
            Main::upField($_POST['VALUE'], $_POST['ID'], 'task_text');
        }
        if ($_POST['VALUE'] && $_POST['ID'] && $_POST['ACTION'] == 'edit_select') {
            Main::upField($_POST['VALUE'], $_POST['ID'], 'status');
        }
    }

    public static function taskList(int $count)
    {
        if (!empty($_GET['page']) && $_GET['page'] > 0) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else {
            $sort = 'id';
        }

        $art          = ($page * $count) - $count;
        $all_quantity = OTHER\Task::all_quantity('');
        if ($all_quantity > $count) {
            $str_pag = ceil($all_quantity / $count); //quantity pages
        }

        $ar_result_tasklist["list"]    = OTHER\Task::getList('', $art, $count, $sort);
        $ar_result_tasklist["str_pag"] = $str_pag;
        $ar_result_tasklist["page"]    = $page;
        $ar_result_tasklist["art"]     = $art;
        return $ar_result_tasklist;
    }

    public function actionIndex()
    {
        $count              = 3;  //quantity tasks for output
        $ar_result_tasklist = self::taskList($count);

        $this->render('main/index', $ar_result_tasklist);
    }
}
