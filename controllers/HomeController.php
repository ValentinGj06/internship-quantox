<?php

namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('index', [
            'name' => 'Guest'
        ]);
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                $user = User::findOne(['email' => $registerModel->email]);
                Application::$app->login($user);
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }
        return $this->render('register', [
            'model' => $registerModel,
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}