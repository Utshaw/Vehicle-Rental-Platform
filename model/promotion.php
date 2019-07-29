
<?php



class Promotion implements JsonSerializable {

    private $PROMOTION_ID;
    private $DISCOUNT_AMOUNT;
    private $EXPIRY_DATE;
    private $COMPANY_ID;

    public function __get($name)
    {
        return $this->$name;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }


    public function jsonSerialize()
    {

        return  get_object_vars($this);
    }
}