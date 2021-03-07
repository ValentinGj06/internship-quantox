<?php

namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('index', [
            'name' => 'Valentin'
        ]);
    }
}