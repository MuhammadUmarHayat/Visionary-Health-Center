
<?php
include 'actions.php';//include config file
$email = start_session();
include 'db_actions.php'; // Include your database connection file
include '../includes/header.php';//include footer
include '../includes/doctor_navbar.php';//include footer
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Retrieve form data
    $doctor_id = $email;
    $app_date = $_POST['app_date'];
    $app_from = $_POST['app_from'];
    $app_to = $_POST['app_to'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Call the saveAppointment function
    if (saveAppointment($doctor_id, $app_date, $app_from, $app_to, $status, $remarks)) {
        echo "<div class='alert alert-success'>Appointment saved successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to save appointment.</div>";
    }
}
?>

<div class="container my-5">
    <h2>Set Your available time slot</h2>
    <form action="add_slot.php" method="POST">
        <div class="form-group">
            <label for="doctor_id">Doctor ID</label>
            <?php echo $email?>
        </div>
        <div class="form-group">
            <label for="app_date">Appointment Date</label>
            <input type="date" class="form-control" id="app_date" name="app_date" required>
        </div>
        <div class="form-group">
            <label for="app_from">Appointment From (Time)</label>
            <input type="time" class="form-control" id="app_from" name="app_from" required>
        </div>
        <div class="form-group">
            <label for="app_to">Appointment To (Time)</label>
            <input type="time" class="form-control" id="app_to" name="app_to" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="available">Available</option>
                <option value="booked">Booked</option>
            </select>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save </button>
    </form>
</div>
<?php
include '../includes/footer.php';//include footer
?>