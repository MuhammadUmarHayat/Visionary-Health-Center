<?php
include 'db_actions.php';
include 'actions.php';
// Start the session

$email = start_session();
//die($email);
$result = showUserProfile($email);
?>

<?php
include '../includes/header.php';//include footer
?>
   
   <?php
include '../includes/doctor_navbar.php';//include footer
?>
<div class="container my-5">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4><?php echo $row['first_name'] . " " . $row['last_name']; ?></h4>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Birthday:</strong> <?php echo $row['birthday']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p class="card-text"><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                    <p class="card-text"><strong>Age:</strong> <?php echo $row['age']; ?></p>
                    <p class="card-text"><strong>Qualification:</strong> <?php echo $row['qualification']; ?></p>
                    <p class="card-text"><strong>Specialisation:</strong> <?php echo $row['specialization']; ?></p>
                    <p class="card-text"><strong>Experience:</strong> <?php echo $row['experience']; ?></p>
                    <p>
                    <a class="btn btn-sm btn-dark btn-lg" href="editDoctorProfile.php?id=<?php echo $row['email']; ?>" >Edit</a>
        </p>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-warning" role="alert">
            No results found.
        </div>
        <?php
    }
    ?>
</div>

<?php
include '../includes/footer.php';//include footer
?>