<?php


class Customer {

    private $CUSTOMER_ID;
    private $CONTACT_NAME;
    private $COMPANY_NAME;
    private $ADDRESS;
    private $EMAIL_ADDRESS;
    private $CONTACT_NUMBER;
    private $PASSWORD;




    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }





}