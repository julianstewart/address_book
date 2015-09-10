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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO contacts (name, phone_number, address) VALUES ('{$this->getName()}', '{$this->getPhoneNumber()}', '{$this->getAddress()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_contacts = $GLOBALS['DB']->query("SELECT * FROM contacts;");
            $contacts = array();
            foreach($returned_contacts as $contact) {
                $name = $contact['name'];
                $phone_number = $contact['phone_number'];
                $address = $contact['address'];
                $id = $contact['id'];
                $new_contact = new Contact($name, $phone_number, $address, $id);
                array_push($contacts, $new_contact);
            }
            return $contacts;
        }

        static function deleteAll()
        {
        }
    }

?>
