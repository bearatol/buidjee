<?php

class NotfoundController
{

    public function actionIndex()
    {
        require_once(ROOT . '/templates/header.php');
        require_once(ROOT . '/application/views/notfound/index.php');
        require_once(ROOT . '/templates/footer.php');

        return true;
    }
}
