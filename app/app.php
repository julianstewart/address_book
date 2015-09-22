<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";
    require_once __DIR__."/../src/Category.php";

    // must come after autoload file is included
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=address_book';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('categories' => Category::getAll()));
    });

    $app->get("/contacts", function() use ($app) {
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->get("/contacts/{id}/edit", function($id) use ($app) {
        $contact = Contact::find($id);
        return $app['twig']->render('contact_edit.html.twig', array('contact' => $contact));
    });

    $app->get("/categories/{id}", function($id) use ($app) {
        $category = Category::find($id);
        return $app['twig']->render('category.html.twig', array('category' => $category, 'contact' => $category->getContacts()));
    });

    $app->patch("/contacts/{id}", function($id) use ($app) {
        $contact_name = $_POST['contact_name'];
        $contact_phone_number = $_POST['contact_phone_number'];
        $contact_address = $_POST['contact_address'];
        $contact = Contact::find($id);
        $contact->update($contact_name, $contact_phone_number, $contact_address);
        return $app['twig']->render('contacts.html.twig', array('contact' => $contact->getContacts()));
    });

    $app->delete("/contacts/{id}", function($id) use ($app) {
        $contact = Contact::find($id);
        $contact->delete();
        return $app['twig']->render('index.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/contacts", function() use ($app) {
        $contact_name = $_POST['contact_name'];
        $contact_phone_number = $_POST['contact_phone_number'];
        $contact_address = $_POST['contact_address'];
        $category_id = $_POST['category_id'];
        $contact = new Contact($contact_name, $contact_phone_number, $contact_address, $id = null, $category_id);
        $contact->save();
        $category = Category::find($category_id);
        return $app['twig']->render('category.html.twig', array('category' => $category, 'contacts' => $category->getContacts()));

        $contact = new Contact($_POST['contact_name'], $_POST['contact_phone_number'], $_POST['contact_address']);
        $contact->save();
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->get("/categories", function() use ($app) {
        return $app['twig']->render('categories.html.twig', array('categories' => Category::getAll()));
    });

    $app->post("/categories", function() use ($app) {
        $category = new Category($_POST['name']);
        $category->save();
        return $app['twig']->render('index.html.twig', array('categories' => Category::getAll()));
    });

    $app->post("/delete_categories", function() use ($app) {
        Category::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

    return $app;
?>
