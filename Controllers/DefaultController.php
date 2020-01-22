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

    public function admin()
    {
        return $this->render('admin',[]);
    }

    public function search()
    {
        return $this->render('search',[]);
    }

    public function order(){
        $flag = false;
        $validation = new Validation($_POST);
        $flag = $validation->validateOrder();
        
        if($_POST['amount']>$_GET['amount'])
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

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

                $amoutn_of_products = $_GET['amount'] - $_POST['amount'];

                $modify = $conn->prepare('UPDATE product SET amount = :amount WHERE product.product_id = :id;');
                $modify->bindParam(':amount',$amoutn_of_products,PDO::PARAM_INT);
                $modify->bindParam(':id',$_GET['device'],PDO::PARAM_INT);
                $modify->execute();

                $conn->commit();

                $this->render('my-shop',[]);
            }catch(PDOException $e){
                $conn->rollBack();
                $db->closeConnection();
                echo $e;exit();
                header('Location:?page=confirmation&device='.$_GET['device']);
                exit();
            }
        else
            {
                echo "else";exit();
                header('Location:?page=confirmation&device='.$_GET['device']);
            }
    }

    public function prolonge(){
        $date_end = date("Y-m-d",strtotime("+7 day"));
        $db = new Database('localhost','project','root','');
        $conn = $db->getConn();

        try{
            $select = $conn->prepare('SELECT orders.date_end FROM orders WHERE orders.orders_id=:id');
            $select->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
            $select->execute();
        }catch(Exception $e)
        {
            echo $e;
        }
        

        $date_end = $select->fetch(PDO::FETCH_ASSOC);
    
        $date_end = new DateTime($date_end['date_end']);
        $date_end->modify('+7 day');
        $date_end = $date_end->format('Y-m-d');
      
        try{
            $update = $conn->prepare('UPDATE orders SET date_end = :date_end WHERE orders.orders_id = :id;');
            $update->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
            $update->bindParam(':date_end',$date_end,PDO::PARAM_STR);
            $update->execute();
        }catch(Exception $e)
        {
            echo $e;
        }
    
        header('Location:?page=my-shop');
    }

    public function addNewProduct(){
        try{
            $db = new Database('localhost','project','root','');
            $conn = $db->getConn();
            $conn->beginTransaction();                

            $details = $conn->prepare('INSERT INTO details (details_id,description) VALUES (null,:json_string)');
            $details->bindParam(':json_string',$_POST['json'],PDO::PARAM_STR);
            $details->execute();
            
            $category = $conn->prepare('SELECT name FROM category WHERE category_id=:id');
            $category->bindParam(':id',$_POST['select'],PDO::PARAM_INT);
            $category->execute();
            $category_name = $category->fetch(PDO::FETCH_ASSOC);
            
            $max_details = $conn->prepare('SELECT max(details_id) AS maxId FROM details');
            $max_details->execute();
            $max_details_id = $max_details->fetch(PDO::FETCH_ASSOC);

            $order = $conn->prepare('INSERT INTO product (product_id,mark, model, amount, details_id, category_id, cost) VALUES (null,:mark, :model, :amount, :details_id, :category_id, :cost)');
            $order->bindParam(':mark',$_POST['mark'],PDO::PARAM_STR);
            $order->bindParam(':model',$_POST['model'],PDO::PARAM_STR);
            $order->bindParam(':amount',$_POST['amount'],PDO::PARAM_INT);
            $order->bindParam(':details_id',$max_details_id['maxId'],PDO::PARAM_INT);
            $order->bindParam(':category_id',$_POST['select'],PDO::PARAM_INT);
            $order->bindParam(':cost',$_POST['cost'],PDO::PARAM_INT);
            $order->execute();

            $conn->commit();
            
            if(isset($_FILES['image'])){
                $errors= array();
                
                if(empty($errors)==true){
                    if(!is_dir('D:\xampp\htdocs\projekt\Public\img\\'.$category_name['name'].'s\\'.$_POST['mark'].''.$_POST['model']))
                        mkdir('D:\xampp\htdocs\projekt\Public\img\\'.$category_name['name'].'s\\'.$_POST['mark'].''.$_POST['model']);
                        $number = count($_FILES['image']['name']);

                    for($i=0;$i<$number;$i++)
                    {
                        $file_name = $_FILES['image']['name'][$i];
                        $file_size =$_FILES['image']['size'][$i];
                        $file_tmp =$_FILES['image']['tmp_name'][$i];
                        $file_type=$_FILES['image']['type'][$i];

                        $extensions= array("jpeg","jpg","png");

                        if($file_size > 2097152){
                            $errors[]='File size must be excately 2 MB';
                        }
                        move_uploaded_file($file_tmp,'D:\xampp\htdocs\projekt\Public\img\\'.$category_name['name'].'s\\'.$_POST['mark'].''.$_POST['model'].'\\'.$file_name);
                    }    
                }else{
                    $this->render('admin',$errors);
                }
             }

            $this->render('admin',[]);
        }catch(PDOException $e){
            $conn->rollBack();
            $db->closeConnection();
            echo $e;exit();
            header('Location:?page=admin');
            exit();
        }
    }
}