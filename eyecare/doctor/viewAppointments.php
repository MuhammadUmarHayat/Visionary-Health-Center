<?php
include 'db_actions.php'; // Include your database connection file
include 'actions.php';
?>
<?php

$email = start_session();
// Call the function to get the appointment list
$appointments = showAppointmentList($email);
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/doctor_navbar.php';//include footer
?>

<div class="container my-5">
    <h2>Appointment List for Doctor ID: <?php echo $email; ?></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($appointments->num_rows > 0) {
                while ($row = $appointments->fetch_assoc())
                 {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['patient_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['app_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['app_time']); ?></td>
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