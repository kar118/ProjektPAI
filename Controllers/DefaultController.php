<?php
require_once 'AppController.php';

class DefaultController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function confirmation()
    {
        return $this->render('confirmation',[]);
    }

    public function devices()
    {
        return $this->render('devices',[]);
    }

    public function main()
    {
        return $this->render('main',[]);
    }

    public function myShop()
    {
        return $this->render('my-shop',[]);
    }

    public function userAccount()
    {
        return $this->render('userAccount',[]);
    }


}
