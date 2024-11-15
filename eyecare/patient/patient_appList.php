<?php
include 'actions.php';//include config file
include 'db_actions.php';
$patient_id = start_session();
$result= showAppointments($patient_id);
//patient_appList.php
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/patient_navbar.php';//include footer
?>
    <div class="container my-5">
        <h2 class="mb-4">Appointments List</h2>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) 
                {
                    while ($row = $result->fetch_assoc()) 
                    {  
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['patient_id']; ?></td>
                    <td><?php echo $row['doctor_id']; ?></td>
                    
                    <td><?php echo $row['app_date']; ?></td>
                    <td><?php echo $row['app_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No certifications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
include '../includes/footer.php';//include footer
?>