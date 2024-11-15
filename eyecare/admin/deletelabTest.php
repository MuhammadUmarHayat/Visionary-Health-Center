<?php

include 'db_actions.php';
include 'actions.php';
$test ;
if (isset($_GET['id'])) 
{
    $testId = $_GET['id'];
    
    if(deletelab($testId)) // Function to fetch the lab test details based on the ID
   {
    
    goLabTest();// go to labtest.php
   }
  
    
}

?>