<?php
class Contact
{
    private $name;
    private $phone_number;
    private $address;

    function __construct($name, $phone_number, $address)
    {
        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->address = $address;
    }

    function setDescription($new_description)
    {
        $this->description = (string) $new_description;
    }

    function getDescription()
    {
        return $this->description;
    }

    function save()
    {
        array_push($_SESSION['list_of_tasks'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_tasks'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_tasks'] = array();
    }
}

?>
