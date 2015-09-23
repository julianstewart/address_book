<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Category.php";
    require_once "src/Contact.php";

    $server = 'mysql:host=localhost;dbname=address_book_test';
    $username = 'root';
    $password ='root';
    $DB = new PDO($server, $username, $password);

    class CategoryTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Category::deleteAll();
            Contact::deleteAll();
        }

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

        function test_save()
        {
            //arrange
            $name = "Business";
            $test_Category = new Category($name);
            $test_Category->save();

            //act
            $result = Category::getAll();

            //assert
            $this->assertEquals($test_Category, $result[0]);
        }

        function test_getAll()
        {
            //arrange
            $name = "Business";
            $name2 = "Personal";
            $test_Category = new Category($name);
            $test_Category->save();
            $test_Category2 = new Category($name2);
            $test_Category2->save();

            //act
            $result = Category::getAll();

            //assert
            $this->assertEquals([$test_Category, $test_Category2], $result);
        }

        function test_find()
        {
            //arrange
            $name = "Business";
            $name2 = "Personal";
            $test_Category = new Category($name);
            $test_Category->save();
            $test_Category2 = new Category($name2);
            $test_Category2->save();

            //act
            $result = Category::find($test_Category->getId());

            //assert
            $this->assertEquals($test_Category, $result);
        }

        function test_getContacts()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $test_category_id = $test_category->getId();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $test_category_id);
            $test_contact->save();

            $contact_name2 = "John Doe";
            $phone_number2 = "666-666-6666";
            $address2 = "6 Main Street, Anytown, Anystate 66666";
            $test_contact2 = new Contact($contact_name2, $phone_number2, $address2, $id, $test_category_id);
            $test_contact2->save();

            //act
            $result = $test_category->getContacts();

            //assert
            $this->assertEquals([$test_contact, $test_contact2], $result);
        }

        function test_update()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $new_name = "Personal";

            //act
            $test_category->update($new_name);

            //assert
            $this->assertEquals("Personal", $test_category->getName());
        }

        function test_delete()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $name2 = "Personal";
            $test_category2 = new Category($name2, $id);
            $test_category2->save();

            //act
            $test_category->delete();

            //assert
            $this->assertEquals([$test_category2], Category::getAll());
        }

        function test_deleteAll()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $name2 = "Personal";
            $test_category2 = new Category($name, $id);
            $test_category2->save();

            //act
            Category::deleteAll();

            //assert
            $result = Category::getAll();
            $this->assertEquals([], $result);

        }
    }

?>
