<?php

use View\View;

include_once ROOT . '/application/models/User.php';

class UserController extends View
{
    public static function taskList(int $count)
    {
        if (!empty($_SESSION["arUser"]["login"])) {
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
            $all_quantity = OTHER\Task::all_quantity($_SESSION["arUser"]["login"]);
            if ($all_quantity > $count) {
                $str_pag = ceil($all_quantity / $count); //quantity pages
            }

            $ar_result_tasklist["list"]    = OTHER\Task::getList($_SESSION["arUser"]["login"], $art, $count, $sort);
            $ar_result_tasklist["str_pag"] = $str_pag;
            $ar_result_tasklist["page"]    = $page;
            $ar_result_tasklist["art"]     = $art;
        } else {
            $ar_result_tasklist = [];
        }

        return $ar_result_tasklist;
    }

    public function actionIndex()
    {

        $count              = 3;  //quantity tasks for output
        $ar_result_tasklist = self::taskList($count);

        $this->render('user/index', $ar_result_tasklist);

        return true;
    }

    public function actionCreate()
    {

        $this->render('user/create');

        return true;
    }
}
