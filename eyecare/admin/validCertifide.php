<?php
include 'db_actions.php';

echo $id= $_GET['id'];//receive data from patientlist
echo $status="valid";

 $result=updateCertification($id,$status);
 if($result){
    $status='success';
    header("Location: http://localhost/eyecare/admin/patientlist.php?status=" . $status);
 }
?>