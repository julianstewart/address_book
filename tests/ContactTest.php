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
            $id = 1;
            $test_Name = new Contact($name, $id);

            //act
            $result = $test_Name->getName();

            //assert
            $this->assertEquals($name, $result);

            //for debugging
            // var_dump($name);
            // var_dump($id);
            // var_dump($test_Name);

        }

        function test_getPhoneNumber()
        {

            //arrange
            $phone_number = "555-555-5555";
            $id = 1;
            $test_phoneNumber = new Contact($phone_number, $id);

            //act
            $result = $test_phoneNumber->getPhoneNumber();

            //assert
            $this->assertEquals($phone_number, $result);

            //for debugging
            var_dump($phone_number);
            var_dump($id);
            var_dump($test_phoneNumber);

        }

    }

?>
