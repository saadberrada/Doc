<?php

include './config.php';
include "Entity/CloudAlertes.php";


class AlerteDao extends CloudAlertes
{
    function __construct($Em) {
        //$this->User = new User();
        $this->em = $Em;
    }

    // private $en;
    // function __construct() {
    //     $this->User = new User();
    //     $this->en = $this->entityManager;
    // }

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
            $alertes = $this->em->getRepository('CloudAlertes')->findAll();
            $response = array();
            foreach ($alertes as $alerte) {
                $data = [
                'alerte' => [
                    'titre' => $alerte->getTitre()
                    // other fields
                ]
            ];
            }
            return json_encode($data);
            
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
                            ->from("CloudAlertes", "a")
                            ->getQuery();
            return $query->getSingleScalarResult();
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