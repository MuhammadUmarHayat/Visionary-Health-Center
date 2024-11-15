
<?php
include 'actions.php';//include config file
$email = start_session();
include 'db_actions.php'; // Include your database connection file
include '../includes/header.php';//include footer
include '../includes/doctor_navbar.php';//include footer

//add_patient_record.php

?>

<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //INSERT INTO `patient_records`(`app_date`, `doctor_id`, `patient_id`, `Details`, `Recommendations`, `lab_tests`, `next_appointment`, `status`) 
    $app_date = date("Y-m-d");
    // Retrieve form data
    $doctor_id = $email;
    
    $patient_id = $_POST['patient_id'];
    $Details = $_POST['Details'];
    $status ='completed';
    $Recommendations = $_POST['Recommendations'];
    $lab_tests = $_POST['lab_tests'];
    $next_appointment = $_POST['next_appointment'];

    // Call the saveAppointment function
    if (savePatientRecord($app_date,$doctor_id,$patient_id,$Details,$Recommendations,$lab_tests,$next_appointment,$status))
     {
       $app_record= appointmentId($patient_id,$doctor_id);
       $row = mysqli_fetch_assoc($app_record);
       $id=$row['id'];
      
       updateAppointment($id,$status);
         

        echo "<div class='alert alert-success'>Appointment saved successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to save appointment.</div>";
    }
}
?>
 
 <div class="container my-5">
    <h2>Add Patient Record</h2>
    <form action="add_patient_record.php" method="POST">
        <!-- Doctor Information -->
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <p><?php echo htmlspecialchars($email); ?></p>
        </div>




        <div class="form-group">
        <select name="patient_id" class="form-control" required>
<option disabled selected>-- Select patient--</option>

<?php

$patients_list=showAppointmentList($email);

    while($data = mysqli_fetch_array($patients_list))
    {
        echo "<option value='". $data['patient_id'] ."'>" .$data['patient_id'] ."</option>";  // displaying data in option menu
    }	
?>  
</select> 
        </div>
         <!-- Details -->
         <div class="form-group">
            <label for="Details">Details</label>
            <textarea class="form-control" id="Details" name="Details" required rows="3"></textarea>
        </div>

        <!-- Recommendations -->
        <div class="form-group">
            <label for="Recommendations">Recommendations</label>
            <textarea class="form-control" id="Recommendations" name="Recommendations" required rows="3"></textarea>
        </div>

        <!-- Lab Tests -->
        <div class="form-group">
            <label for="lab_tests">Lab Tests</label>
            <textarea class="form-control" id="lab_tests" name="lab_tests" required rows="3"></textarea>
        </div>

        <!-- Next Appointment -->
        <div class="form-group">
            <label for="next_appointment">Next Appointment (Date)</label>
            <input type="date" class="form-control" id="next_appointment" name="next_appointment" required>
        </div>

        <!-- Remarks -->
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<?php
include '../includes/footer.php'; // Include footer
?>
