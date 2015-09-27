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

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function getAddress()
        {
            return $this->address;
        }

        function getId()
        {
            return $this->id;
        }

        function getCategoryId()
        {
            return $this->category_id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = $new_phone_number;
        }

        function setAddress($new_address)
        {
            $this->address = $new_address;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO contacts (name, phone_number, address, category_id) VALUES ('{$this->getName()}', '{$this->getPhoneNumber()}', '{$this->getAddress()}', {$this->getCategoryId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_name, $new_phone_number, $new_address)
        {
            $GLOBALS['DB']->exec("UPDATE contacts SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("UPDATE contacts SET phone_number = '{$new_phone_number}' WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("UPDATE contacts SET address = '{$new_address}' WHERE id = {$this->getId()};");
            $this->name = $new_name;
            $this->phone_number = $new_phone_number;
            $this->address = $new_address;
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM contacts WHERE id = {$this->getId()};");
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
                $category_id = $contact['category_id'];
                $new_contact = new Contact($name, $phone_number, $address, $id, $category_id);
                array_push($contacts, $new_contact);
            }
            return $contacts;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM contacts;");
        }

        static function find($search_id)
        {
            $found_contact = null;
            $contacts = Contact::getAll();
            foreach($contacts as $contact) {
                $contact_id = $contact->getId();
                if ($contact_id == $search_id) {
                    $found_contact = $contact;
                }
            }
            return $found_contact;
        }
    }

?>
