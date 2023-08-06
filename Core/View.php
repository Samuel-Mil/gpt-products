<?php

namespace App\Core;

class View
{
    public string $styleSheet = '';

    public function render($view, array $params = [])
    {
        $page= $this->rederOnlyView($view, $params);
        $layout= $this->renderLayout();

        echo str_replace("{{content}}", $page, $layout);
    }

    public function renderLayout()
    {
        $layout = Application::$layout;
        if(Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        ob_start();
        include_once Application::$ROOT_DIR. "/Views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function rederOnlyView($path, array $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR. "/Views/pages/$path.php";
        return ob_get_clean();
    }

    public function setStyleSheet(string $styleSheet)
    {
        $this->styleSheet = $styleSheet;
    }

    public function getStyleSheet()
    {
        return $_ENV['APP_URL'].'//css/'.$this->styleSheet.'.css';
    }
}
