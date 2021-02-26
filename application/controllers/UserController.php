<?php
include_once ROOT . '/application/models/User.php';

class UserController
{

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
