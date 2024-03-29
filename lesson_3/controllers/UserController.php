<?php

namespace App\controllers;

use App\models\User;

class UserController
{
    private $action;
    private $defaultAction = 'users';

    public function run($action)
    {
        $this->action = $action ?: $this->defaultAction;

        $method = $this->action . 'Action';

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }

    }

    public function userAction()
    {

        echo '{"user": 12, "date": "2018-09-12"}';
    }

    public function usersAction()
    {
        $params = [
            'users' => User::getAll(),
        ];

        echo $this->render('users', $params);

    }

    public function render($template, $params = [])
    {
        $content = $this->renderTmpl($template, $params);

        return $this->renderTmpl(
            'layouts/main',
            ['content' => $content]
        );
    }

    public function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include $_SERVER['DOCUMENT_ROOT']
            . '/../views/'
            . $template . '.php';
        return ob_get_clean();
    }
}