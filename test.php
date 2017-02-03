<?php

//include_once 'config.php';
include_once "DAO/DaoUser.php";
include_once "DAO/DaoAlerte.php";
	
//var_dump($entityManager);
$UserDao = new UserDao($entityManager);
$a = $UserDao->get_user(1);
//var_dump($a);

//$all = $UserDao->get_all();

/********/
$count = $UserDao->get_count();
/****/
echo '</br>';
echo "count = $count";
//echo $count;
echo '</br>';
/********************************************************************/

$AlerteDao = new AlerteDao($entityManager);
$a = $AlerteDao->get_alerte(1);
var_dump($a);

//echo json_encode($a);
//print_r($a);
//$t = var_dump($a);


//add alerte
$ta = array("idStock" => "1",
			"date" => new \DateTime(),
			"titre" => "tatatata",
			"message" => "message"
			
	);
$AlerteDao->add_alerte($ta);
$all = $AlerteDao->get_all();
echo ($all);


$T = [1,3];
//$AlerteDao->delete_entities($T);



/*******************************************************************/
//$user = new User();
// $user->setName("saad");
// $user->setPassword("saad-2016");
// $entityManager->persist($user);
// $entityManager->flush();
// var_dump($user);

//$UserDao = new UserDao();
//var_dump($user->get_single($entityManager,1));


/**get by ID/
$id = 1;
$user = $entityManager->find('User', $id);

if ($user === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $user->getName());




/**get by champ*/
// $id = 1;
// $users = $entityManager->getRepository('User')->findBy(array('name' => 'saad'));

// foreach ((array)$users as $user) {
// 	echo sprintf("-%s\n", $user->getId());
// 	echo sprintf("-%s\n", $user->getName());
//     echo sprintf("-%s\n", $user->getPassword());
//     // echo sprintf(" 	");
// }

/*findAll/
$users = $entityManager->getRepository('User')->findAll();
//var_dump(count ($users));
echo "count = ".(count ($users));
foreach ($users as $user) {
	echo "<br>";
	echo sprintf("-%s\n", $user->getId());
    echo sprintf("-%s\n", $user->getName());
    //echo sprintf(" 	");
    echo "<br>";

}




/**update**/
// $id = 6;
// $user = $entityManager->find('User', $id);

// if ($user === null) {
//     echo "Product $id does not exist.\n";
//     exit(1);
// }
// else{
// 	$newName = "TestUpdate6";
// 	$user->setName($newName);
// 	$entityManager->flush();
// 	echo "Ok";
// }


// $prenom = $_GET['user'] ?? 'personne';
// $x = NULL;
// $y = NULL;
// $z = 3;
// var_dump($x ?? $y ?? $z); // int(3)

// $a = 1;
// $action = ($a == 2) ? 'défaut' : 'NON';
// echo "<br>";
// echo $action;

// echo "<br>";
// $a = 2;
// echo "$a+2";
// echo "<br>";

// echo "<br>";
// $dodo = 6;
// $dodo += 2;
// var_dump($dodo);

// for ($i=0 ; $i<=3 ; $i++ ) 
// 	{ echo $i;
// 	  echo "<br>"; 
// 	}

// $t = [2,3];
// //echo ksort($t);
// echo array_pop($t);
// $a = 'a'.file_exists(__FILE__);
// $a1 = 'wiki';
// $a2 = 'kiwi';
// echo ${$a};

// $b = false;
// $a = unset($b);
// var_dump($a);


//echo mktime("2017-01-08");
?>