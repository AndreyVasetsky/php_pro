<?php

namespace App\controllers;

use App\services\renders\IRender;
use App\services\renders\TmplRender;

abstract class Controller
{
    private $action;
    protected $defaultAction = 'index';

    /**
     * @var TmplRender;
     */
    protected $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

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
        return $this->render->render($template, $params);
    }
}