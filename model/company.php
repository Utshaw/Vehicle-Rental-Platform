<?php




class Company {

    private $COMPANY_ID;
    private $COMPANY_NAME;
    private $EMAIL_ADDRESS;
    private $PASSWORD;
    private $ADDRESS;
    private $MOBILE_NUMBER;
    
    
    
    


    public function __get($name)
    {
        return $this->$name;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}