<?php
include 'includes/header.php'; //include header
include 'includes/main_navbar.php'; //include main navbar
include 'db_actions.php'; //include database file


if(isset($_POST['search'])) //check login button is clicked or not
{
    $doctor_name= $_POST['doctor_name'];
    $doctors = searchDoctor($doctor_name);
}
else{
    $doctors = viewAllDoctors();
}

?>

<!-- Search Section -->
<section id="search-doctor" class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="allDoctors.php" class="input-group">
                    <input type="text" name="doctor_name" class="form-control" placeholder="Search for a doctor by name..." aria-label="Search for a doctor by name" required>
                    <button type="submit" name ="search" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Doctors Section -->
<section id="doctors" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Meet Our Eye Specialist</h2>
        <div class="row">
            <?php
           
            if ($doctors && $doctors->num_rows > 0) {
                while ($rowDoctors = $doctors->fetch_assoc()) { ?>
                    <!-- Doctor 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rowDoctors['photo']); ?>" class="card-img-top" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rowDoctors['first_name'] . " " . $rowDoctors['last_name']; ?></h5>
                               <p class="card-text"> <b> Qualification : </b><?php echo $rowDoctors['qualification']; ?> </p>
                              <p class="card-text"> <b> Specialization : </b> <?php echo $rowDoctors['specialization']; ?> </p>
                               <p class="card-text"> <b> Experience :</b><?php echo $rowDoctors['experience']; ?> </p>
                                
                            <p class="card-text"> <b> Email :</b><?php echo $rowDoctors['doctor_id']; ?> </p>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
