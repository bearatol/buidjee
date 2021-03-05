<?php

use View\View;

class NotfoundController extends View
{

    public function actionIndex()
    {
        $this->render('notfound/index');

        return true;
    }
}
