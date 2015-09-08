<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Contact.php";

    $server = 'mysql:host=localhost;dbname=address_book_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ContactTest extends PHPUnit_Framework_TestCase
    {

        function test_getName()
        {
            //arrange
            $name = "Jane Doe";
            $phone_number = "";
            $address = "";
            $test_Contact = new Contact($name, $phone_number, $address);

            //act
            $result = $test_Contact->getName();

            //assert
            $this->assertEquals($name, $result);

            //for debugging
            var_dump($test_Contact);
        }

        function test_getPhoneNumber()
        {
            //arrange
            $name = "";
            $phone_number = "555-555-5555";
            $address = "";
            $test_Contact = new Contact($name, $phone_number, $address);

            //act
            $result = $test_Contact->getPhoneNumber();

            //assert
            $this->assertEquals($phone_number, $result);

            //for debugging
            var_dump($test_Contact);
        }

        function test_getAddress()
        {
            //arrange
            $name = "";
            $phone_number = "";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $test_Contact = new Contact($name, $phone_number, $address);

            //act
            $result = $test_Contact->getAddress();

            //assert
            $this->assertEquals($address, $result);

            //for debugging
            var_dump($test_Contact);
        }

    }

?>
