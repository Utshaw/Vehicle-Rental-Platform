<?php



class Model{


    private $MODEL_ID;
    private $MODEL_NAME;



    public function __get($name)
    {
        return $this->$name;
    }



    public function __set($name, $value)
    {
        $this->$name = $value;
    }


}