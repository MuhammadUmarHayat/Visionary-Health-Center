<?php

include 'db_actions.php';

if (isset($_POST['save'])) 
{
   // Fetching form data
   echo $patient_id = $_POST['patient_id'];
   echo $doctor_id = $_POST['doctor_id'];
   echo $app_date = $_POST['app_date'];
   echo $app_time = $_POST['app_time'];
   echo $status = $_POST['status'];

   // Debugging: check the data being submitted
   

   // Save appointment
   if(saveAppointment($patient_id, $doctor_id, $app_date, $app_time, $status))
   {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Appointment has been booked successfully.
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
   }
   else
   {
        
       echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Something is wrong. Please try again.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
   }
}
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/admin_navbar.php';//include footer
?>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Make Appointments</h3>
            </div>
            <div class="card-body">
                <form action="add_appointment.php" method="post">
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Select Doctor:</label>
                        <select class="form-control" name="doctor_id"  id="doctor_id" required>
                            <option disabled selected>-- Select Doctor --</option>
                            <?php
                                $records = getDoctor(); 
                                while($data = mysqli_fetch_array($records))
                                {
                                    echo "<option value='". $data['email'] ."'>" .$data['first_name'] ." " .$data['last_name'] ."</option>";  // Use doctor_id instead of email
                                }	
                            ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">Select Patient:</label>
                        <select class="form-control" name="patient_id" id="patient_id" required>
                            <option disabled selected>-- Select Patient --</option>
                            <?php
                                $records = getPatient(); 
                                while($data = mysqli_fetch_array($records))
                                {
                                    echo "<option value='". $data['email'] ."'>" .$data['first_name'] ." " .$data['last_name'] ."</option>";  // Use patient_id instead of email
                                }	
                            ?>  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="app_date" class="form-label">Appointment Date:</label>
                        <input type="date" class="form-control" id="app_date" name="app_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="app_time" class="form-label">Appointment Time:</label>
                        <input type="time" class="form-control" id="app_time" name="app_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="save" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
   
   <?php
include '../includes/footer.php';//include footer
?>