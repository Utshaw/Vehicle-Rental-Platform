<?php



class Make  {

    private $MAKE_ID;
    private $MAKE_NAME;

    public function __get($name)
    {
        return $this->$name;
    }



    public function __set($name, $value)
    {
        $this->$name = $value;
    }


}