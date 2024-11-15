<?php
include 'actions.php';//include config file
include 'db_actions.php'; // Include your database connection file
?>

<?php

$email = start_session();
// Call the function to get the appointment list
$records = viewAllPatientRecordByDoctor($email);

if(isset($_POST['search'])) //check contactus button is clicked or not
{
    $patient_id=  $_POST['patient_id'];
    $records = viewPatientHistory($patient_id);
}



include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/doctor_navbar.php';//include footer
//app_date`, `doctor_id`, `patient_id`, `Details`, `Recommendations`, `lab_tests`, `next_appointment`, `status`) 
?>

<div class="container my-5">
<div class="d-flex justify-content-center my-4">
    <form action="patient_history.php" method="POST" class="w-50">
        <div class="input-group">
            <input 
                type="text" 
                placeholder="Search..." 
                name="patient_id" 
                id="patient_id" 
                class="form-control"
            >
            <button type="submit" id="search" name="search"class="btn btn-primary">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>
</div>

    <h2>Patient Records for Doctor: <?php echo $email; ?></h2>
    <table class="table table-striped">
        <thead>
        
            <tr>
                <th>ID</th>
                <th>Patient </th>
                <th>Appointment Date</th>
                <th>Details</th>
                <th>Recommendations </th>
                <th>Lab Test</th>
                <th>Next Visit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            //app_date`, `doctor_id`, `patient_id`, `Details`, `Recommendations`, `lab_tests`, `next_appointment`, `status`) 
            $i=1;
            if ($records->num_rows > 0) 
            {
                while ($row = $records->fetch_assoc())
                 {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['app_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['Details']); ?></td>
                        <td><?php echo htmlspecialchars($row['Recommendations']); ?></td>
                        <td><?php echo htmlspecialchars($row['lab_tests']); ?></td>
                        <td><?php echo htmlspecialchars($row['next_appointment']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include '../includes/footer.php';//include footer
?>