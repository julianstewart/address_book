<?php

    class Contact
    {
        private $name;
        private $phone_number;
        private $address;
        private $id;

        function __construct($name, $phone_number, $address, $id = null)
        {
            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->address = $address;
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

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = $new_phone_number;
        }

        function getAddress()
        {
            return $this->address;
        }

        function setAddress($new_address)
        {
            $this->address = $new_address;
        }

        // need to extend insert statement to include phone number and address
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO contacts (name) VALUES ('{$this->getName()}');");
        }

        static function getAll()
        {

        }

        // static function deleteAll()
        // {
        //     $_SESSION['list_of_contacts'] = array();
        // }
    }

?>
