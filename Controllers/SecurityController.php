<?php
require_once 'AppController.php';
require_once 'Models/Address.php';
require_once 'Models/User.php';
require_once 'Models/Database.php';
require_once 'Models/Validation.php';

class SecurityController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function resetEmail()
    {
        return $this->render('resetEmail',[]);
    }

    public function resetPass()
    {
        return $this->render('resetPass',[]);
    }

    public function singIn()
    {
        return $this->render('singIn',[]);
    }

    public function singUp()
    {
        return $this->render('singUp',[]);
    }

    public function login(){
        $user = null;
        $address = null;
        $addressId = null; 

        $db = new Database('localhost','project','root','');
        $conn = $db->getConn();
        $user_stmt = $conn->prepare('SELECT * FROM users');
        $address_stmt = $conn->prepare('SELECT * FROM addresses where addressId = :addressId');
        $user_stmt->execute();
        
        foreach($user_stmt as $row)
        {
            if($row['email'] === $_POST['email'])
            {
                $addressId = $row['addressId'];
                $address_stmt->bindParam(':addressId',$addressId,PDO::PARAM_INT);
                $address_stmt->execute();
                $tmp = $address_stmt->fetch(PDO::FETCH_ASSOC);
                $address = new Address($tmp['country'],$tmp['locality'],$tmp['street'],$tmp['streetNum'],$tmp['flatNum'],$tmp['postcodeNum'],$tmp['postcodeLocality']);
                $user = new User($row['name'],$row['surname'],$address,$row['email'],$row['password']);
                $_SESSION['user'] = serialize($user);
                $_SESSION['id'] = $user->getEmail();
                $_SESSION['user_id'] = $row['userId'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['country'] = $address->getCountry();
                $_SESSION['locality'] = $address->getLocality();
                $_SESSION['street'] = $address->getStreet();
                $_SESSION['streetNum'] = $address->getStreetNum();
                $_SESSION['flatNum'] = $address->getFlatNum();
                $_SESSION['postNum'] = $address->getPostNum();
                $_SESSION['postLocality'] = $address->getPostLocality();
                $db->closeConnection();
                break;
            }
        }

        if(!$user) {
            return $this->render('singIn', ['message' => ['Email not recognized']]);
        }

        if(!password_verify($_POST['password'], $user->getPassword())) {
            return $this->render('singIn', ['message' => ['Wrong password']]);
        }
        else
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}projekt/index.php?page=main");
        }

        $this->render('singIn');
    }

    public function logout(){
        session_unset();
        session_destroy();
        $this->render('singIn',['text' => 'You have been successfully logged out!']);
    }

    public function createAccount(){

        $_POST['name'] = strtoupper($_POST['name']);
        $_POST['surname'] = strtoupper($_POST['surname']);
        $_POST['country'] = strtoupper($_POST['country']);
        $_POST['locality'] = strtoupper($_POST['locality']);
        $_POST['street'] = strtoupper($_POST['street']);
        $_POST['street_number'] = strtoupper($_POST['street_number']);
        $_POST['postcode_locality'] = strtoupper($_POST['postcode_locality']);

        $flag = true;
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $maxId = null;

        $validation = new Validation($_POST);
        $flag = $validation->validateRegisterForm();
        $messages = $validation->getMessages();

        if($flag){
            $conn = null;

            try{
                $db = new Database('localhost','project','root','');
                $conn = $db->getConn();
                $conn->beginTransaction();                
                $insertAddress = $conn->prepare('INSERT INTO addresses (country, locality, street, streetNum, postcodeLocality, postcodeNum, flatNum) VALUES (:country, :locality, :street, :street_number, :post_locality, :post_number, :flat_number)');
                $insertAddress->bindParam(':country',$_POST['country'],PDO::PARAM_STR);
                $insertAddress->bindParam(':locality',$_POST['locality'],PDO::PARAM_STR);
                $insertAddress->bindParam(':street',$_POST['street'],PDO::PARAM_STR);
                $insertAddress->bindParam(':street_number',$_POST['street_number'],PDO::PARAM_INT);
                $insertAddress->bindParam(':post_locality',$_POST['postcode_locality'],PDO::PARAM_STR);
                $insertAddress->bindParam(':post_number',$_POST['postcode_number'],PDO::PARAM_INT);
                $insertAddress->bindParam(':flat_number',$_POST['flat_number'],PDO::PARAM_INT);
                $insertAddress->execute();
    
                $maxId = $conn->lastInsertId();
                echo $_POST['email'];
                $insertUsers = $conn->prepare('INSERT INTO users (name, surname, email, password, addressId) VALUES (:name,:surname,:email,:password_hash,:maxId)');  
                $insertUsers->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
                $insertUsers->bindParam(':surname',$_POST['surname'],PDO::PARAM_STR);
                $insertUsers->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
                $insertUsers->bindParam(':password_hash',$password_hash,PDO::PARAM_STR);
                $insertUsers->bindParam(':maxId',$maxId,PDO::PARAM_INT);
                $insertUsers->execute();
                
                $conn->commit();

            }catch(PDOException $e){
                $conn->rollBack();
                $db->closeConnection();
                echo $e;
                $err = 'err';
                $err_val = 'Account has not been created!';
                $this->render('singUp', $messages);
                exit();
            }
            $db->closeConnection();
            $this->render('singIn', ['message' => ['You\'ve created an account!']]);
            exit();
        }
        else{echo 'flag';
            $this->render('singUp', $messages);
        }
    }
}