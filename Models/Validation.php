<?php 
class Validation{
    private $name = null;
    private $surname = null;
    private $email = null;
    private $pass = null;
    private $pass_confirm = null;
    private $country = null;
    private $locality = null;
    private $street = null;
    private $street_number = null;
    private $flat_number = null;
    private $post_number = null;
    private $post_locality = null;

    public function __construct(
            $name,
            $surname,
            $email,
            $pass,
            $pass_confirm,
            $country,
            $locality,
            $street,
            $street_number,
            $flat_number,
            $post_number,
            $post_locality
        )
        {
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
            $this->pass = $pass;
            $this->pass_confirm = $pass_confirm;
            $this->country = $country;
            $this->locality = $locality;
            $this->street = $street;
            $this->street_number = $street_number;
            $this->flat_number = $flat_number;
            $this->post_number = $post_number;
            $this->post_locality = $post_locality;

        }

    //Sygnalizowanie błędów
    private $messages = [];
    private $err_surname_name = null;
    private $err_surname_name_val = null;
    private $err_email = null;
    private $err_email_val = null;
    private $err_pass = null;
    private $err_pass_val = null;
    private $err_country = null;
    private $err_country_val = null;
    private $err_locality = null;
    private $err_locality_val = null;
    private $err_street = null;
    private $err_street_val = null;
    private $err_flat_number = null;
    private $err_flat_number_val = null;
    private $err_postcode = null;
    private $err_postcode_val = null;
    private $err = null;
    private $err_val = null;
 
    private $flag = true;

    public function resetMessagesValues(){
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

        $flag = true;    
    }
    
    public function getMessages() : array{
        $messages = [
            $this->err_surname_name=>$this->err_surname_name_val,
            $this->err_email=>$this->err_email_val,
            $this->err_pass=>$this->err_pass_val,
            $this->err_street=>$this->err_street_val,
            $this->err_flat_number=>$this->err_flat_number_val,
            $this->err_country=>$this->err_country_val,
            $this->err_locality=>$this->err_locality_val,
            $this->err_postcode=>$this->err_postcode_val,
            $this->err=>$this->err_val
        ];

        return $messages;
    }

    public function validateRegisterForm(){

        if(strlen($this->name) < 3 || (1 === preg_match('~[0-9]~', $this->name))){
            $this->flag = false;
            $this->err_surname_name = 'err_surname_name';
            $this->err_surname_name_val = 'Incorrect name or surname!';
        }
        if(strlen($this->surname) < 3 || (1 === preg_match('~[0-9]~', $this->surname))){
            $this->flag = false;
            $this->err_surname_name = 'err_surname_name';
            $this->err_surname_name_val = 'Incorrect name or surname!';
        } 
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->flag = false;
            $this->err_email = 'err_email';
            $this->err_email_val = 'Incorrect email!';
        }
         if($this->pass !== $this->pass_confirm){
            $this->flag = false;
            $this->err_pass = 'err_pass';
            $this->err_pass_val = 'Different passwords!';
        }
        if(strlen($this->pass) < 8){
            $this->flag = false;
            $this->err_pass = 'err_pass';
            $this->err_pass_val = 'Password must consist of at least 8 characters!';
        }
        if(strlen($this->country) < 3){
            $this->flag = false;
            $this->err_country = 'err_country';
            $this->err_country_val = 'Name of country is incorrect!';
        }
        if(strlen($this->locality) < 1){
            $this->flag = false;
            $this->err_locality = 'err_locality';
            $this->err_locality_val = 'Name of locality is incorrect!';
        }
        if($this->street === ''){
            $this->street === 'Brak';
        }else if(strlen($this->street) < 1){
            $this->flag = false;
            $this->err_street = 'err_street';
            $this->err_street_val = 'Name of street is incorrect!';
        }
        if($street_number === ''){
            $street_number = 0;
        }else if($this->street_number < 1){
            $this->flag = false;
            $this->err_street = 'err_street';
            $this->err_street_val = 'Number of street is incorrect!';
        }
        if($this->flat_number < 1){
            $this->flag = false;
            $this->err_flat_number = 'err_flat_number';
            $this->err_flat_number_val = 'Name of street is incorrect!';
        }
        if(strlen($this->post_locality) < 1){
            $this->flag = false;
            $this->err_postcode = 'err_postcode';
            $this->err_postcode_val = 'Postcode locality is incorrect!';
        }
        if(!preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $this->post_number)){
            $this->flag = false;
            $this->err_postcode = 'err_postcode';
            $this->err_postcode_val = 'Postcode number is incorrect!';
        }

        return $this->flag;
    }

    public function validateOrder() :bool{
        $flag = true;

        if(strlen($_POST['country']) < 3)
            $flag = false;
        
        if(strlen($_POST['locality']) < 1)
            $flag = false;
        
        if($_POST['street'] === '')
            $_POST['street'] === 'Brak';
        else if(strlen($_POST['street']) < 1)
            $flag = false;
        
        if($_POST['streetNum'] === '')
            $_POST['streetNum'] = 0;
        else if($_POST['streetNum'] < 1)
            $flag = false;
        
        if($_POST['flatNum'] < 1)
            $flag = false;
        
        if(strlen($_POST['postLocality']) < 1)
            $flag = false;

        if(!preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $_POST['postNum']))
            $flag = false;

        return $flag;
    }
}