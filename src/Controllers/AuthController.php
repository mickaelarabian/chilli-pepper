<?php

require_once '../src/Renderer.php';
require_once '../src/Models/Facade/Auth.php';
require_once '../src/Models/Entities/User.php';

class AuthController
{

    public function displayLogin()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        echo Renderer::render('/user/login.php');
    }

    public function displaySignup()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        echo Renderer::render('/user/signup.php');
    }

    public function displayPanel()
    {
        if (!Auth::isLogged()) {
            header('Location: /');
        }
        echo Renderer::render('/user/panel.php');
    }

    public function actionLogin()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $password = hash('sha512', $password);
        Auth::logUser($login, $password);
    }

    public function actionSignup()
    {
        if (Auth::isLogged()) {
            header('Location: /');
        }
        $user = new User();
        $user->setName(htmlspecialchars($_POST['name']));
        $user->setLogin(htmlspecialchars($_POST['login']));
        $user->setPassword(htmlspecialchars($_POST['password']));
        Auth::addUser($user);
        header('Location: /user/login');
    }

    public function actionLogout()
    {
        Auth::logout();
        header('Location: /');
    }
}
