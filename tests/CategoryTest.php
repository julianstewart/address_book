<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Category.php";

    $server = 'mysql:host=localhost;dbname=address_book_test';
    $username = 'root';
    $password ='root';
    $DB = new PDO($server, $username, $password);

    class CategoryTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Category::deleteAll();
        // }

        function test_getName()
        {
            //arrange
            $name = "Business";
            $test_category = new Category($name);

            //act
            $result = $test_category->getName();

            //assert
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            //arrange
            $name = "Business";
            $id = 1;
            $test_Category = new Category($name, $id);

            //act
            $result = $test_Category->getId();

            //assert
            $this->assertEquals(true, is_numeric($result));
        }
    }

?>
