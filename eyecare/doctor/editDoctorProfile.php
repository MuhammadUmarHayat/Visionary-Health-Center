<?php
include 'db_actions.php';
include 'actions.php';
//session_start();


start_session();
$email = $_GET['id']; // Get the email from the URL

$result = showUserProfile($email);
// Check if the user exists
if ($result->num_rows == 1) 
{
    $user = $result->fetch_assoc();//fetch a single row or record
} 
else 
{
    echo "User not found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") //update button
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
   
// $first_name,$last_name,$birthday,$gender,$age,$addres,$problem, $remarks,$certificate_no,$certificate_status
updateProfile($email, $first_name,$last_name,$birthday,$gender,$age,$qualification,$specialization,$experience);
header('Location:http://localhost/eyecare/doctor/doctor_profile.php');

}
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/doctor_navbar.php';//include footer
?>
<div class="container mt-5">
    <h2>Edit Profile</h2>
    <form method="POST" action="editDoctorProfile.php?id=<?php echo $email; ?>">
        <!-- User Information -->
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if ($user['gender'] == 'Other') echo 'selected'; ?>>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo $user['age']; ?>" required>
        </div>

        <!-- Doctor Information -->
        <div class="form-group">
            <label for="addres">Qualification</label>
            <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $user['qualification']; ?>" >
        </div>
        <div class="form-group">
            <label for="sp">Specialization</label>
            <input type="text" class="form-control" id="specialization" name="specialization" value="<?php echo $user['specialization']; ?>" >
        </div>
        <div class="form-group">
            <label for="exp">Experience</label>
            <input type="text" class="form-control" id="experience" name="experience" value="<?php echo $user['experience']; ?>" >
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update Profile</button>
        <a href="patient_profile.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php
include '../includes/footer.php';//include footer
?>