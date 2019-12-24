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

    public function devices_laptops()
    {
        return $this->render('devices_laptops',[]);
    }

    public function devices_projectors()
    {
        return $this->render('devices_projectors',[]);
    }

    public function devices_speakers()
    {
        return $this->render('devices_speakers',[]);
    }

    public function devices_cameras()
    {
        return $this->render('devices_cameras',[]);
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
