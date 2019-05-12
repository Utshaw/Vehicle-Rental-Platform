<?php




class Bus {

    private $VEHICLE_ID;
    private $MAKE_NAME;
    private $MODEL_ID;
    private $DAILY_RATE;
    private $TOTAL_NUMBER_OF_VEHICLES;
    private $IMAGE;
    private $MODEL_TYPE;
    private $MAX_CAPACITY;
    private $MIN_COST;
    private $MAX_COST;
    private $DATE_REQUIRED;

    public function __get($name)
    {
        return $this->$name;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}