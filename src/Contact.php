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

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }
}

?>
