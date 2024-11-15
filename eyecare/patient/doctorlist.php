<?php
include 'db_actions.php'; // Ensure this file contains the database connection logic


// Call the function to get the doctor list
$doctors = showDoctorList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Doctor List</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <?php 
        if ($doctors->num_rows > 0) {
            while ($row = $doctors->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['specialization']; ?></h6>
                            <p class="card-text">
                                <strong>Qualification:</strong> <?php echo $row['qualification']; ?><br>
                                <strong>Experience:</strong> <?php echo $row['experience']; ?> years<br>
                                <strong>Email:</strong> <?php echo $row['email']; ?><br>
                                <strong>Gender:</strong> <?php echo $row['gender']; ?><br>
                                <strong>Age:</strong> <?php echo $row['age']; ?><br>
                                <strong>Available:</strong> <?php echo $row['is_available'] ? 'Yes' : 'No'; ?><br>
                            </p>
                            <a href="bookAppointment.php?doctor_id=<?php echo $row['doctor_id']; ?>" class="btn btn-primary">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No doctors found.</p>";
        }
        ?>
    </div>

</div>

</body>
</html>
