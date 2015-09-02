<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Contact.php";

    $server = 'mysql:host=localhost;dbname=';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class NameTest extends PHPUnit_Framework_TestCase
    {
        
    }

?>
