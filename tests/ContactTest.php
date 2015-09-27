<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Contact.php";
    require_once "src/Category.php";

    $server = 'mysql:host=localhost:8889;dbname=address_book_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ContactTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Contact::deleteAll();
            Category::deleteAll();
        }

        function test_getId()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $category_id = $test_category->getId();
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $category_id);
            $test_contact->save();

            //act
            $result = $test_contact->getId();

            //assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getCategoryId()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $category_id = $test_category->getId();
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $category_id);

            //act
            $test_contact->save();

            //assert
            $result = Contact::getAll();
            $this->assertEquals($test_contact, $result[0]);
        }

        function test_save()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $category_id = $test_category->getId();
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $category_id);

            //act
            $test_contact->save();

            //assert
            $result = Contact::getAll();
            $this->assertEquals($test_contact, $result[0]);
        }

        function test_getAll()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $category_id = $test_category->getId();
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $category_id);
            $test_contact->save();

            $contact_name2 = "John Doe";
            $phone_number2 = "666-666-6666";
            $address2 = "6 Main Street, Anytown, Anystate 66666";
            $test_contact2 = new Contact($contact_name2, $phone_number2, $address2, $id, $category_id);
            $test_contact2->save();

            //act
            $result = Contact::getAll();

            //assert
            $this->assertEquals([$test_contact, $test_contact2], $result);
        }

        function test_deleteAll()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $category_id = $test_category->getId();
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $category_id);
            $test_contact->save();

            $contact_name2 = "John Doe";
            $phone_number2 = "666-666-6666";
            $address2 = "6 Main Street, Anytown, Anystate 66666";
            $test_contact2 = new Contact($contact_name2, $phone_number2, $address2, $id, $category_id);
            $test_contact2->save();

            //act
            Contact::deleteAll();

            //assert
            $result = Contact::getAll();
            $this->assertEquals([], $result);

        }

        function test_find()
        {
            //arrange
            $name = "Business";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $contact_name = "Jane Doe";
            $phone_number = "555-555-5555";
            $address = "5 Main Street, Anytown, Anystate 55555";
            $category_id = $test_category->getId();
            $test_contact = new Contact($contact_name, $phone_number, $address, $id, $category_id);
            $test_contact->save();

            $contact_name2 = "John Doe";
            $phone_number2 = "666-666-6666";
            $address2 = "6 Main Street, Anytown, Anystate 66666";
            $test_contact2 = new Contact($contact_name2, $phone_number2, $address2, $id, $category_id);
            $test_contact2->save();

            //act
            $result = Contact::find($test_contact->getId());

            //assert
            $this->assertEquals($test_contact, $result);
        }

    }

?>
