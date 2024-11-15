<?php
include 'db_actions.php';
include 'actions.php';
//session_start();


start_session();
$email = $_GET['id']; // Get the email from the URL

$result = showUserProfile($email);
// Check if the user exists
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} 
else 
{
    echo "User not found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $addres = $_POST['addres'];
    $problem = $_POST['problem'];
    $remarks = $_POST['remarks'];
    $certificate_no = $_POST['certificate_no'];
    $certificate_status = $_POST['certificate_status'];
// $first_name,$last_name,$birthday,$gender,$age,$addres,$problem, $remarks,$certificate_no,$certificate_status
updateProfile($email, $first_name,$last_name,$birthday,$gender,$age,$addres,$problem, $remarks,$certificate_no,$certificate_status);
header('Location:http://localhost/eyecare/patient/patient_profile.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Profile</h2>
    <form method="POST" action="editPatientProfile.php?id=<?php echo $email; ?>">
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

        <!-- Patient Information -->
        <div class="form-group">
            <label for="addres">Address</label>
            <input type="text" class="form-control" id="addres" name="addres" value="<?php echo $user['addres']; ?>" required>
        </div>
        <div class="form-group">
            <label for="problem">Problem</label>
            <textarea class="form-control" id="problem" name="problem" required><?php echo $user['problem']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks"><?php echo $user['remarks']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="certificate_no">Certificate No</label>
            <input type="text" class="form-control" id="certificate_no" name="certificate_no" value="<?php echo $user['certificate_no']; ?>">
        </div>
        <div class="form-group">
            <label for="certificate_status">Certificate Status</label>
            <select class="form-control" id="certificate_status" name="certificate_status">
                <option value="Valid" <?php if ($user['certificate_status'] == 'Valid') echo 'selected'; ?>>Valid</option>
                <option value="Invalid" <?php if ($user['certificate_status'] == 'Invalid') echo 'selected'; ?>>Invalid</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
        <a href="patient_profile.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
