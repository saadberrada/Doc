<?php

include_once '../config.php';


class UserDao
{

    function get_single($id)
    {
        try
        {     
            $name = $entityManager->find("User",$id);
            return $name;
        }
        catch(Exception $err)
        {
            return NULL;
        }
    }

}

?>