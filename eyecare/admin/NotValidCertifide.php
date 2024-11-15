<?php
include 'db_actions.php';

echo $id= $_GET['id'];
echo $status="not valid";

 $result=updateCertification($id,$status);
 if($result)
 {
    $status='success';
    header("Location: http://localhost/eyecare/admin/patientlist.php?status=" . $status);
 }
?>