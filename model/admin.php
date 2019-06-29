<?php


class Admin {

    private $ADMIN_ID;
    private $EMAIL_ADDRESS;
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