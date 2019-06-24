<?php




class VehicleCompany {

    private $COMPANY_ID;
    private $COMPANY_NAME;


    public function __get($name)
    {
        return $this->$name;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}