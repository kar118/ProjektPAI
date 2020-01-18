<?php
require_once 'AppController.php';
require_once 'Models/Validation.php';
require_once 'Models/Database.php';

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

    public function order(){

        $validation = new Validation("","","","","","","","","","","","");
        $flag = $validation->validateOrder();

        if($flag)
            try{
                $db = new Database('localhost','project','root','');
                $conn = $db->getConn();
                $conn->beginTransaction();                

                $date_start = date("Y-m-d");
                $date_end = date("Y-m-d",strtotime("+7 day"));

                $order = $conn->prepare('INSERT INTO orders (orders_id,product_id, user_id, date_start, amount, date_end) VALUES (null,:product_id, :user_id, :date_start, :amount, :date_end)');
                $order->bindParam(':product_id',$_GET['device'],PDO::PARAM_INT);
                $order->bindParam(':user_id',$_SESSION['user_id'],PDO::PARAM_INT);
                $order->bindParam(':date_start',$date_start,PDO::PARAM_STR);
                $order->bindParam(':amount',$_POST['amount'],PDO::PARAM_INT);
                $order->bindParam(':date_end',$date_end,PDO::PARAM_STR);
                $order->execute();

                $conn->commit();

                $this->render('my-shop',[]);
            }catch(PDOException $e){
                $conn->rollBack();
                $db->closeConnection();

                header('Location:?page=confirmation&device='.$_GET['device']);
                exit();
            }
        else
            header('Location:?page=confirmation&device='.$_GET['device']);
    }
}