<?php

    class Contact
    {
        private $id;
        private $name;
        // private $phone_number;
        // private $address;

        function __construct($name, $id)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        // function setPhoneNumber($new_phone_number)
        // {
        //     $this->phone_number = (string) $new_phone_number;
        // }
        //
        // function getPhoneNumber()
        // {
        //     return $this->phone_number;
        // }
        //
        // function setAddress($new_address)
        // {
        //     $this->address = (string) $new_address;
        // }
        //
        // function getAddress()
        // {
        //     return $this->address;
        // }
        //
        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }
        //
        // static function getAll()
        // {
        //     return $_SESSION['list_of_contacts'];
        // }
        //
        // static function deleteAll()
        // {
        //     $_SESSION['list_of_contacts'] = array();
        // }
    }

?>
