<?php

// echo "test";
// bootstrap.php
require_once "vendor/autoload.php";
// include_once "Entity/User.php";
// include_once "DAO/DaoUser.php";

//use Entity;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("Entity");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrine',
);


$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);



//var_dump($entityManager);

// echo "Created Product with ID " . $product->getPassword() . "\n";


// echo "saad";
// $user = new User();
// $user->setName("saad");
// $user->setPassword("saadXXXX");
// $entityManager->persist($user);
// $entityManager->flush();
// var_dump($user);

?>