<?php 
class Validation{
    private $parameters = null;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;    
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

    public function validateUserName():bool{
        if(strlen($this->parameters['name']) < 3 || (1 === preg_match('~[0-9]~', $this->parameters['name']))){
            $this->err_surname_name = 'err_surname_name';
            $this->err_surname_name_val = 'Incorrect name or surname!';            
            return false;
        }else
            return true;
    }

    public function validateUserSurname():bool{
        if(strlen($this->parameters['surname']) < 3 || (1 === preg_match('~[0-9]~', $this->parameters['surname']))){
            $this->err_surname_name = 'err_surname_name';
            $this->err_surname_name_val = 'Incorrect name or surname!';            
            return false;
        }else
            return true;
    }

    public function validateEmail():bool{
        if (!filter_var($this->parameters['email'], FILTER_VALIDATE_EMAIL)) {
            $this->err_email = 'err_email';
            $this->err_email_val = 'Incorrect email!';
            return false;
        }else
            return true;
    }

    public function validatePassword(){
        if($this->parameters['password'] !== $this->parameters['confirm_password']){
            $this->err_pass = 'err_pass';
            $this->err_pass_val = 'Different passwords!';   
            return false;
        }
        if(strlen($this->parameters['password']) < 8){
            $this->err_pass = 'err_pass';
            $this->err_pass_val = 'Password must consist of at least 8 characters!';
            return false;
        }    
        return true;
    }

    public function validateCountry():bool{
        if(strlen($this->parameters['country']) < 3){
            $this->err_country = 'err_country';
            $this->err_country_val = 'Name of country is incorrect!';
            return false;
        }else
            return true;
    }

    public function validateLocality():bool{
        if(strlen($this->parameters['locality']) < 1){
            $this->err_locality = 'err_locality';
            $this->err_locality_val = 'Name of locality is incorrect!';
            return false;
        }else
            return true;
    }

    public function validateStreet():bool{
        if($this->parameters['street'] === ''){
            $this->parameters['street'] = 'Brak';
        }else if(strlen($this->parameters['street']) < 1){
            $this->err_street = 'err_street';
            $this->err_street_val = 'Name of street is incorrect!';
            return false;
        }
        if($this->parameters['street_number'] === ''){
            $this->parameters['street_number'] = 0;
        }else if($this->parameters['street_number'] < 1){
            $this->err_street = 'err_street';
            $this->err_street_val = 'Number of street is incorrect!';
            return false;
        }
        return true;
    }

    public function validateFlatNumber():bool{
        if($this->parameters['flat_number'] < 1){
            $this->err_flat_number = 'err_flat_number';
            $this->err_flat_number_val = 'Name of street is incorrect!';
            return false;
        }else
            return true;
    }

    public function validatePostLocality():bool{
        if(strlen($this->parameters['postcode_locality']) < 1){
            $this->err_postcode = 'err_postcode';
            $this->err_postcode_val = 'Postcode locality is incorrect!';
            return false;
        }else
            return true;
    }

    public function validatePostCode():bool{
        if(!preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $this->parameters['postcode_number'])){
            $this->err_postcode = 'err_postcode';
            $this->err_postcode_val = 'Postcode number is incorrect!';
            return false;
        }else
            return true;
    }

    public function validateRegisterForm():bool{
        $this->flag = true;

        $this->flag = $this->validateUserName();
        if(!$this->flag) return $this->flag;
        
        $this->flag = $this->validateUserSurname();
        if(!$this->flag) return $this->flag;
        
        $this->flag = $this->validateEmail();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validatePassword();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateLocality();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateCountry();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validatePostCode();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validatePostLocality();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateFlatNumber();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateStreet();
        if(!$this->flag) return $this->flag;

        return $this->flag;
    }

    public function validateOrder() :bool{
        $flag = true;

        $this->flag = $this->validateLocality();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateCountry();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validatePostCode();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validatePostLocality();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateFlatNumber();
        if(!$this->flag) return $this->flag;

        $this->flag = $this->validateStreet();
        if(!$this->flag) return $this->flag;

        return $flag;
    }
}