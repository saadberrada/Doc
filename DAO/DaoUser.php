<?php

include './config.php';
include "Entity/User.php";


class UserDao extends User
{
    function __construct($Em) {
        $this->User = new User();
        $this->em = $Em;
    }

    // private $en;
    // function __construct() {
    //     $this->User = new User();
    //     $this->en = $this->entityManager;
    // }

    function get_user($id)
    {
        try
        {     
            //var_dump($this->em);
            $name = $this->em->find("User",$id);
            return $name;
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
            $users = $this->em->getRepository('User')->findAll();
            //var_dump(count ($users));
            echo "count = ".(count ($users));
            foreach ($users as $user) {
                echo "<br>";
                echo sprintf("-%s\n", $user->getId());
                echo sprintf("-%s\n", $user->getName());
                //echo sprintf("    ");
                echo "<br>";
            }

            
        }
        catch(Exception $err)
        {
            return NULL;
        }
    }


    function get_count()
    {
        try
        {
            $query = $this->em->createQueryBuilder()
                            ->select("count(a)")
                            ->from("User", "a")
                            ->getQuery();
            return $query->getSingleScalarResult();
        }
        catch(Exception $err)
        {
            return 0;
        }
    }


    // function add_user()
    // {    
    //     $user = new user();
    //     $contact->setName($this->input->post("name");
    //     $contact->setEmail($this->input->post("email");
    //     $contact->setSubject($this->input->post("subject");
    //     $contact->setMessage($this->input->post("message");
         
    //     try {
    //         //save to database
    //         $this->em->persist($contact);
    //         $this->em->flush();
    //     }
    //     catch(Exception $err){
             
    //         die($err->getMessage());
    //     }
    //     return true;        
    // }

}

?>