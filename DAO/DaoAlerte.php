<?php

include 'config.php';
include "Entity/CloudAlertes.php";
require_once ('class.php');
//include "Entity/CloudCustomer.php";
//include "Entity/CloudStock.php";
//include "Entity/EntitySerializer.php";


class AlerteDao extends AbsClass
{
    function __construct() {
       // $this->setEntityName();
    }

    public function setEntityName() {
        // $this->customer = new CloudAlertes();
        // parent::init($this->customer);

    }
    // function __construct($Em) {
    //     //$this->User = new User();
    //     $this->em = $Em;
    // }

    // private $en;
    // function __construct() {
    //     $this->User = new User();
    //     $this->en = $this->entityManager;
    // }

    function testa ()
    {
        echo get_class();
    }

    public function getAll() {
        return parent::getAll();
    }

    function get_alerte($id)
    {
        try
        {     
            //var_dump($this->em);
            $alerte = $this->em->find("CloudAlertes",$id);
            
            // $serializer = $this->get('jms_serializer');
            // $response = $serializer->serialize($users,'json');
            // return new Response($response);
            
            //return [
                //'tittre' => $this->getTitre(),
                //'description' => $this->getDescription(),
            //];

            return $alerte;
        }
        catch(Exception $err)
        {
            return NULL;
        }
    }

    /*findAll*/
    function get_all()
    {   try
        {   
            $alertes = $this->em->getRepository('CloudStock')->findAll();

            // $response = array();
            // foreach ($alertes as $alerte) {
            //     $response[] = array(
            //         'type' => $alerte->getTitre()
            //         // other fields
            //  );
            // }
            // $tmp = array(
            //      "alerte" => $response
            // );
            // return  json_encode($tmp);

            //header('Content-Type: application/json');
            //$response = json_encode($alertes);
            return   $alertes;

            //  $alertes = array_map(function($user) {
            //     return $this->convertToArray($user); },
            //     $alertes);
            // $data = json_encode($alertes);
            // return json_encode($data);
        }
        catch(Exception $err)
        {
            return NULL;
        }
    }

    /*getcount*/
    function get_count()
    {
        try
        {
            $query = $this->em->createQueryBuilder()
                            ->select("count(a)")
                            ->from("CloudStock", "a")
                            ->getQuery();
            return $query->getSingleScalarResult();
        }
        catch(Exception $err)
        {
            return 0;
        }
    }


    function getAlla() {
        try {
            //$records = $this->entityManager->getRepository($this->entityname)->findAll();
            $query = $this->em->createQueryBuilder()
            ->select("c")
            ->from("CloudCustomer","c")
            ->getQuery()->getArrayResult();
            //->execute();
        } catch (Exception $e) {
            echo "Exception : ".$e->getMessage();
        }
        return json_encode($query);
    }


     function test()
     {
        try
        {
            //CloudCustomer
            $query = $this->em->createQueryBuilder()
                            ->select('a')
                            ->from('CloudAlertes','a');
            //$query->setMaxResults(10);
            $entites = $query->getQuery()->getArrayResult();
           // var_dump($entites);
             
             //$entites = $query->getQuery()->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY)
            
            //header('Content-Type: application/json');
            $response = json_encode($entites,JSON_PRETTY_PRINT);
           
             
              // $result = 
              //  serialize($entites); 

            //$serializer = serialize(array_values($entites), 'json');

            
            return $response;
           

            // foreach($entites as $entite)
            // {
            //     var_dump($entite['titre']);
            //    //print $entite->getAttribut();
            // }

            /*****/

            // $query = $this->em->createQuery("SELECT id FROM CloudAlertes");
            // $tests = $query->getArrayResult();
            // print_r($tests);

            /***/
            //$query = $this->em->createQuery('SELECT * FROM cloud_stock');
            //return $query->getArrayResult();
        }
        catch(Exception $err)
        {
            return 0;
        }
     }

    function testSingle($id)
     {
        try
        {
            $query = $this->em->createQueryBuilder()
                            ->select("a")
                            ->from("CloudStock", "a")
                            ->where('a.id = :id');
            $query->setParameter('id', $id);
            //$entites = $query->getQuery()->getSingleScalarResult();
            //$entites = $query->getQuery()->getSingleResult();
            $entites = $query->getQuery()->getArrayResult();
            return $entites;

            // foreach($entites as $entite)
            // {
            //     var_dump($entite['titre']);
            //    //print $entite->getAttribut();
            // }

            /*****/

            // $query = $this->em->createQuery("SELECT id FROM CloudAlertes");
            // $tests = $query->getArrayResult();
            // print_r($tests);

        }
        catch(Exception $err)
        {
            return 0;
        }
     }


    function add_alerte($data,$id=NULL)
    {    

        if(empty($id)){
            $alerte = new CloudAlertes();
        }
        else{
            $alerte = $this->get_alerte($id);
        }
       
        $alerte->setIdStock($data["idStock"]);
        $alerte->setDate($data["date"]);
        $alerte->setTitre($data["titre"]);
        $alerte->setMessage($data["message"]);
        $alerte->setStatus($data["status"]);

        //$alerte->setEmail($this->input->post("email");
        //$alerte->setSubject($this->input->post("subject");
        //$alerte->setMessage($this->input->post("message");
         
        try {
            //save to database
            $this->em->persist($alerte);
            $this->em->flush();
        }
        catch(Exception $err){
             
            die($err->getMessage());
        }
        return true;        
    }

    function delete_entities($ids){
        try
        {
            if(!is_array($ids))
            {
                $ids = array($ids);
            }
            foreach($ids as $id)
            {
                $entity = $this->em->getPartialReference("CloudAlertes", $id);
                $this->em->remove($entity);
                ///echo "delete ->  " .$id;
            }
            $this->em->flush();
            return TRUE;
        }
        catch(Exception $err)
        {
            return FALSE;
        }
    }

}

?>