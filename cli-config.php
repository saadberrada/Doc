<?php

use Doctrine\ORM\Tools\Console\ConsolensoleRunner;

// replace with file to your own project bootstrap
require_once 'C:/xampp/htdocs/webStock/Doctrine/config.php';

// replace with mechanism to retrieve EntityManager in your app
//$entityManager = GetEntityManager();


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

//return ConsoleRunner::createHelperSet($entityManager);
?>