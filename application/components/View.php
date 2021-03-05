<?php


namespace View;


class View
{
    protected function render($file, $variables = [])
    {
        extract($variables, EXTR_OVERWRITE);

        ob_start();
        include(ROOT . '/templates/header.php');
        include(ROOT . '/application/views/' . $file . '.php');
        include(ROOT . '/templates/footer.php');
        $renderedView = ob_get_clean();

        echo $renderedView;

        return true;
    }
}