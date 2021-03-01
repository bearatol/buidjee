<?php
include_once ROOT . '/application/models/User.php';

class UserController
{

    public static function taskList(int $count, bool $only_user_task = false)
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
        $all_quantity = OTHER\Task::all_quantity($only_user_task ? $_SESSION["arUser"]["login"] : '');
        if ($all_quantity > $count) {
            $str_pag = ceil($all_quantity / $count); //quantity pages
        }

        return OTHER\Task::getList($only_user_task ? $_SESSION["arUser"]["login"] : '', $art, $count, $sort);
    }

    public function actionIndex()
    {

        require_once(ROOT . '/templates/header.php');
        require_once(ROOT . '/application/views/user/index.php');
        require_once(ROOT . '/templates/footer.php');

        return true;
    }

    public function actionCreate()
    {

        require_once(ROOT . '/templates/header.php');
        require_once(ROOT . '/application/views/user/create.php');
        require_once(ROOT . '/templates/footer.php');

        return true;
    }
}
