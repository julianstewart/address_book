<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=address_book';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/contacts", function() use ($app) {
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/contacts", function() use ($app) {
        $contact = new Contact($_POST['contact_name'], $_POST['contact_phone_number'], $_POST['contact_address']);
        $contact->save();
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    return $app;
?>
