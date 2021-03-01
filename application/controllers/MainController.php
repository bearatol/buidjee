<?php

include_once ROOT . '/application/models/Main.php';
class MainController
{

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

        $ar_result_tasklist["list"] = OTHER\Task::getList('', $art, $count, $sort);
        $ar_result_tasklist["str_pag"] = $str_pag;
        $ar_result_tasklist["page"] = $page;
        return $ar_result_tasklist;
    }

    public function actionIndex()
    {
        $count = 3;  //quantity tasks for output
        $ar_result_tasklist = self::taskList(3);

        require_once(ROOT . '/templates/header.php');
        require_once(ROOT . '/application/views/main/ajax.php');
        require_once(ROOT . '/application/views/main/index.php');
        require_once(ROOT . '/templates/footer.php');

        return true;
    }
}
