<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Contact.php";

    $server = 'mysql:host=localhost:8889;dbname=address_book_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ContactTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Contact::deleteAll();
        }

        function test_getName()
        {
            //arrange
            $name = "Jane Doe";
            $phone_number = "";
            $address = "";
            $test_contact = new Contact($name, $phone_number, $address);

            //act
            $result = $test_contact->getName();

            //assert
            $this->assertEquals($name, $result);

            //for debugging
            // var_dump($test_contact);
        }

        function test_getPhoneNumber()
        {
            //arrange
            $name = "";
            $phone_number = "555-555-5555";
            $address = "";
            $test_contact = new Contact($name, $phone_number, $address);

            //act
            $result = $test_contact->getPhoneNumber();

            //assert
            $this->assertEquals($phone_number, $result);

            //for debugging
            // var_dump($test_contact);
        }

        function test_getAddress()
        {
            //arrange
            $name = "";
            $phone_number = "";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $test_contact = new Contact($name, $phone_number, $address);

            //act
            $result = $test_contact->getAddress();

            //assert
            $this->assertEquals($address, $result);

            //for debugging
            // var_dump($test_contact);
        }

        function test_save()
        {
            //arrange
            $name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $test_contact = new Contact($name, $phone_number, $address);

            //act
            $test_contact->save();

            //assert
            $result = Contact::getAll();
            $this->assertEquals($test_contact, $result[0]);

            //for debugging
            // var_dump($test_contact);
        }

        function test_getAll()
        {
            //arrange
            $name = "Jane Doe";
            $name2 = "John Doe";
            $phone_number = "555-555-5555";
            $phone_number2 = "666-666-6666";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $address2 = "6 Main Street, Anytown, Anystate 66666";
            $test_contact = new Contact($name, $phone_number, $address);
            $test_contact->save();
            $test_contact2 = new Contact($name2, $phone_number2, $address2);
            $test_contact2->save();

            //act
            $result = Contact::getAll();

            //assert
            $this->assertEquals([$test_contact, $test_contact2], $result);

            //for debugging
            // var_dump($test_contact);
            // var_dump($test_contact2);
        }

        function test_getId()
        {
            //arrange
            $name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $id = 1;
            $test_contact = new Contact($name, $phone_number, $address, $id);

            //act
            $result = $test_contact->getId();

            //assert
            $this->assertEquals(1, $result);

            //for debugging
            // var_dump($test_contact);
        }

        function test_find()
        {
            //arrange
            $name = "Jane Doe";
            $name2 = "John Doe";
            $phone_number = "555-555-5555";
            $phone_number2 = "666-666-6666";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $address2 = "6 Main Street, Anytown, Anystate 66666";
            $test_contact = new Contact($name, $phone_number, $address);
            $test_contact->save();
            $test_contact2 = new Contact($name2, $phone_number2, $address2);
            $test_contact2->save();

            //act
            $id = $test_contact->getId();
            $result = Contact::find($id);

            //assert
            $this->assertEquals($test_contact, $result);

            //for debugging
            // var_dump($test_contact);
            // var_dump($test_contact2);
        }

        function testUpdate()
        {
            //arrange
            $name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $id = null;
            $test_contact = new Contact($name, $phone_number, $address, $id);
            $test_contact->save();

            $new_name = "John Doe";
            $new_phone_number = "666-666-6666";
            $new_address = "6 Main Street, Anytown, Anystate 66666";

            //act
            $test_contact->update($new_name, $new_phone_number, $new_address);

            //assert
            $this->assertEquals("John Doe", $test_contact->getName());

            //for debugging
            var_dump($test_contact);
        }
    }

?>
