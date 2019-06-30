<?php





class VehicleOrder  {

    private $CUSTOMER_ID;
    private $VEHICLE_ID;
    private $BOOKING_DATE;




    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }





}