<?php
include 'db_actions.php';

$id= $_GET['id'];
$status="completed";

 $result=deleteAppointment($id);//delete appointment
 if($result)
 {
    $status='success';
    header("Location: http://localhost/eyecare/admin/appointments.php?status=" . $status);
 }
?>