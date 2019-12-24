<?php

require_once 'Controllers/DefaultController.php';
require_once 'Controllers/SecurityController.php';

class Routing{
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
           'confirmation' => ['controller' => 'DefaultController', 'action' =>
           'confirmation'],
           'devices_laptops' => ['controller' => 'DefaultController', 'action' =>
           'devices_laptops'],
           'devices_projectors' => ['controller' => 'DefaultController', 'action' =>
           'devices_projectors'],
           'devices_speakers' => ['controller' => 'DefaultController', 'action' =>
           'devices_speakers'],
           'devices_cameras' => ['controller' => 'DefaultController', 'action' =>
           'devices_cameras'],
           'main' => ['controller' => 'DefaultController', 'action' =>
           'main'],
           'my-shop' => ['controller' => 'DefaultController', 'action' =>
           'myShop'],
           'resetEmail' => ['controller' => 'SecurityController', 'action' =>
           'resetEmail'],
           'resetPass' => ['controller' => 'SecurityController', 'action' =>
           'resetPass'],
           'singIn' => ['controller' => 'SecurityController', 'action' =>
           'singIn'],
           'singUp' => ['controller' => 'SecurityController', 'action' =>
           'singUp'],
           'userAccount' => ['controller' => 'DefaultController', 'action' =>
           'userAccount'],
           'login' => ['controller' => 'SecurityController', 'action' =>
           'login'],
           'logout' => ['controller' => 'SecurityController', 'action' =>
           'logout'],
           'createAccount' => ['controller' => 'SecurityController', 'action' =>
           'createAccount']
        ];
    }

    public function run() {
        $page = isset($_GET['page']) && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'singIn';

        if($this->routes[$page]) {
            $className = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $className;
            $object->$action();
        }
    }
}