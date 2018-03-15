<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;
//Get All Customers
$app->get('/api/customers', function(Request $request, Response $response){
    $sql = "SELECT * FROM customers";

    try{
        //GET Database Onject
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customers);

    } catch(PDOException $e){
        echo '{"error":{"text":'.$e->getMessage().'}';
    }
});

//Get Single Customers
$app->get('/api/customers/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM customers WHERE `id` = '$id'";

    try{
        //GET Database Onject
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customer);

    } catch(PDOException $e){
        echo '{"error":{"text":'.$e->getMessage().'}';
    }
});

//Add Customers
$app->post('/api/customers/add', function(Request $request, Response $response){
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $state = $request->getParam('state');
    
    

    $sql = "INSERT INTO `customers`(`id`, `first_name`, `last_name`, `phone`, `email`, `address`, `city`, `state`) VALUES ('' ,'$first_name','$last_name','$phone','$email','$address','$city' ,'$state')";

    try{
        //GET Database Onject
        $db = new db();

        //connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        echo '{"notice": {"text":"Customer added"}';

    } catch(PDOException $e){
        echo '{"error":{"text":'.$e->getMessage().'}';
    }
});