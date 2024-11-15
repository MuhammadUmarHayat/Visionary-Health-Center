<?php
include 'db_actions.php';

$result= showAppointmentList();
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/admin_navbar.php';//include footer
?>
<?php if (isset($_GET['status']) && $_GET['status'] == 'success')
{
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Appointment is updated successfully.
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) 
                {
                    while ($row = $result->fetch_assoc()) //fetch a single row
                    {  
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['patient_id']; ?></td>
                    <td><?php echo $row['doctor_id']; ?></td>
                    
                    <td><?php echo $row['app_date']; ?></td>
                    <td><?php echo $row['app_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a href="bookAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Book</a>
                        <a href="completeAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Complete</a>
                        <a href="cancelAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Cancel</a>
                        <a href="DeleteAppointment.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                      
                    </td>
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