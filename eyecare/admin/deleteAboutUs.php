<?php

include 'db_actions.php';
include 'actions.php';
$test ;
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    
    if(deleteAboutUs($id)) // Function to fetch the lab test details based on the ID
   {
    
    goManageAboutus();// go to main page
   }
  
    
}

?>