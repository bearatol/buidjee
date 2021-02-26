<?php
include_once ROOT . '/application/models/Main.php';

class MainController
{
    public function actionIndex()
    {
        require_once(ROOT . '/templates/header.php');
        require_once(ROOT . '/application/views/main/ajax.php');
        require_once(ROOT . '/application/views/main/index.php');
        require_once(ROOT . '/templates/footer.php');

        return true;
    }
}
