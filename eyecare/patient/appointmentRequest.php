<?php
include 'actions.php';//include config file
include 'db_actions.php';
 $patient_id=start_session();
 $id = $_GET['id']; //appointment id
$result=showDrInfo($id);
$message="";
if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    

 $doctor_id=$row['doctor_id'];
 $app_date=$row['app_date'];
  $app_time=$row['app_from']."-".$row['app_to']; 
$status="pending";

sendAppointmentRequest($patient_id, $doctor_id, $app_date, $app_time, $status);
 $message="Your request is submitted Please wait for furthur action";
    
}

?>
<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/patient_navbar.php';//include footer
?>    <div class="container my-5">
      <div class="card mb-4">
      <div class="card-header bg-primary text-white"> Successfull
      </div>
      <div class="card-body">
        <?php
echo $message;
        ?>

</div>
</div>
</div>
</div>
<?php
include '../includes/footer.php';//include footer
?>