<?php

class BaseController
{
    protected $f3;

    public function __construct($f3)
    {
        $this->f3 = $f3;
    }

    public function view($view)
    {
        $this->f3->set('content', 'views/' . $view . '.htm');
        echo Template::instance()->render('views/app.htm');
    }
}