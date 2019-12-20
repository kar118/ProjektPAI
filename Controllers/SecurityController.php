<?php
require_once 'AppController.php';
require_once 'Models/Address.php';
require_once 'Models/User.php';
require_once 'Models/Database.php';

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
        $db = new Database('localhost','project','root','');
        $conn = $db->getConn();
        $stmt = $conn->query('SELECT * FROM users');
            
        foreach($stmt as $row)
        {
            if($row['email'] === $_POST['email'])
            {
                $user = new User($row['name'],$row['surname'],$row['email'],$row['password']);
                $db->closeConnection();
                break;
            }
        }
        $stmt->closeCursor();

            if(!$user) {
                return $this->render('singIn', ['message' => ['Email not recognized']]);
            }
            if (!password_verify($_POST['password'], $user->getPassword())) {
                return $this->render('singIn', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getEmail();
                $_SESSION["name"] = $user->getName();
                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}projekt/index.php?page=main");
                exit();
            }
        $this->render('singIn');
    }

    public function logout(){
        session_unset();
        session_destroy();

        $this->render('singIn',['text' => 'You have been successfully logged out!']);
    }

    public function createAccount(){
        $address = null;
        $user = null;

        $name = strtoupper($_POST['name']);
        $surname = strtoupper($_POST['surname']);
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass_confirm = $_POST['confirm_password'];
        $country = strtoupper($_POST['country']);
        $locality = strtoupper($_POST['locality']);
        $street = strtoupper($_POST['street']);
        $street_number = strtoupper($_POST['street_number']);
        $flat_number = $_POST['flat_number'];
        $post_number = $_POST['postcode_number'];
        $post_locality = strtoupper($_POST['postcode_locality']);

        $flag = true;
        $password_hash = null;
        $maxId = null;

        //Sygnalizowanie błędów
        $messages = [];
        $err_surname_name = null;
        $err_surname_name_val = null;
        $err_email = null;
        $err_email_val = null;
        $err_pass = null;
        $err_pass_val = null;
        $err_country = null;
        $err_country_val = null;
        $err_locality = null;
        $err_locality_val = null;
        $err_street = null;
        $err_street_val = null;
        $err_flat_number = null;
        $err_flat_number_val = null;
        $err_postcode = null;
        $err_postcode_val = null;
        $err = null;
        $err_val = null;

        //Sprawdzenie poprawności imienia

        if(strlen($name) < 3 || (1 === preg_match('~[0-9]~', $name))){
            $flag = false;
            $err_surname_name = 'err_surname_name';
            $err_surname_name_val = 'Incorrect name or surname!';
        }

        //Sprawdzenie poprawności nazwiska

        if(strlen($surname) < 3 || (1 === preg_match('~[0-9]~', $surname))){
            $flag = false;
            $err_surname_name = 'err_surname_name';
            $err_surname_name_val = 'Incorrect name or surname!';
        }

        //Sprawdzenie poprawności email

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $flag = false;
            $err_email = 'err_email';
            $err_email_val = 'Incorrect email!';
        }

        //Sprawdzenie poprawności i jakości hasła

        if($pass !== $pass_confirm){
            $flag = false;
            $err_pass = 'err_pass';
            $err_pass_val = 'Different passwords!';
        }
        else if(strlen($pass) < 8){
            $flag = false;
            $err_pass = 'err_pass';
            $err_pass_val = 'Password must consist of at least 8 characters!';
        }
        else{
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        }

        //Sprawdzenie poprawności państwa

        if(strlen($country) < 3){
            $flag = false;
            $err_country = 'err_country';
            $err_country_val = 'Name of country is incorrect!';
        }

        //Sprawdzenie poprawności miejscowości

        if(strlen($locality) < 1){
            $flag = false;
            $err_locality = 'err_locality';
            $err_locality_val = 'Name of locality is incorrect!';
        }

        //Sprawdzenie poprawności ulicy

        if(strlen($street) < 1){
            $flag = false;
            $err_street = 'err_street';
            $err_street_val = 'Name of street is incorrect!';
        }

        //Sprawdzenie poprawności numeru

        if($street_number < 1){
            $flag = false;
            $err_street = 'err_street';
            $err_street_val = 'Name of street is incorrect!';
        }

        //Sprawdzenie poprawności numeru mieszkania

        if($flat_number < 1){
            $flag = false;
            $err_flat_number = 'err_flat_number';
            $err_flat_number_val = 'Name of street is incorrect!';
        }

        //Sprawdzenie poprawności miejscowości kodu

        if(strlen($post_locality) < 1){
            $flag = false;
            $err_postcode = 'err_postcode';
            $err_postcode_val = 'Postcode locality is incorrect!';
        }

        //Sprawdzenie poprawności numeru kodu

        //Dodanie rekordu do tabeli adres i users
        //Należy porównać email z emailami z bazy jeżeli przejdzie to użytkownik na pewno zostanie dodany inaczej wyrzucamy błąd
        //Utworzyć klasę walidate i przez nią przepuszczać
        //Od razu zwracamy adressId a nie za pomocą max(), bo niebezpieczne dla wielu userów
        //Warto zrobić testy jUnit w php
        //zmienić widoki na jeden pod drugim
        if($flag){
            $address = new Address($country, $locality, $street, $street_number, $flat_number, $post_number, $post_locality);

            try{
                $insertAddress = "INSERT INTO addresses (country, locality, street, streetNum, postcodeLocality, postcodeNum, flatNum) VALUES ('$country', '$locality', '$street', '$street_number', '$post_locality', '$post_number', '$flat_number')";
                $db = new Database('localhost','project','root','');
                $conn = $db->getConn();    
                $stmt = $conn->query($insertAddress);    
            }catch(PDOException $e){
                echo $e->getMessage();
                $db->closeConnection();
                exit();
            }
            
            //Spr. max addressId
           try{
                $maxAddressId = 'SELECT MAX(addressId) as id FROM addresses';
                $stmt = $conn->query($maxAddressId);
    
                foreach($stmt as $row)
                    $maxId = $row['id'];
            }catch(PDOException $e){
                echo $e->getMessage();
                $db->closeConnection();
                exit();
            } 

            //Dodanie rekordu do tabeli użytkownicy
            if($maxId){
                try{
                    $insertUser = "INSERT INTO users (userId, name, surname, email, password, addressId) VALUES (NULL,'$name','$surname','$email','$password_hash','$maxId')";  
                    $conn->query($insertUser);
                }catch(PDOException $e){
                    echo $e->getMessage();
                    $db->closeConnection();
                    exit();
                }
            }
            else{
                exit();
                $db->closeConnection();
                $err = 'err';
                $err_val = 'Account has not been created!';
            }
    
            $db->closeConnection();
            //Przekierownaie do strony logowania

            $this->render('singIn', ['message' => ['You\'ve created an account!']]);
        }
        else{
            $messages = [
                $err_surname_name=>$err_surname_name_val,
                $err_email=>$err_email_val,
                $err_pass=>$err_pass_val,
                $err_street=>$err_street_val,
                $err_flat_number=>$err_flat_number_val,
                $err_country=>$err_country_val,
                $err_locality=>$err_locality_val,
                $err_postcode=>$err_postcode_val,
                $err=>$err_val
            ];
            $this->render('singUp', $messages);
        }
    }
}