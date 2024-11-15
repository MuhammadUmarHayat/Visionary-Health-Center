

<?php
include 'includes/header.php';//include footer
include 'includes/main_navbar.php';//include footer
include 'db_actions.php';//include database file
?>

<!-- About Us Section -->
<?php
 //aboutus
 $abt=viewAboutUs();
 if ($abt && $abt->num_rows > 0) 
                        
 {
     $row = $abt->fetch_assoc();
 }
 ?>
<section id="aboutus" class="py-5 text-center">
    <div class="container">
        <div class="row">
            <!-- About Us Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                    <i class="fa fa-optin-monster"></i>
                        <h5 class="card-title"><?php echo $row['title']?></h5>
                        <p class="card-text">
                        <?php echo $row['description']?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Our Vision Card -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                    <i class="fa fa-tripadvisor"></i>
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">
                            At XYZ Foundation, we believe clear vision is a fundamental right. Our EyeCare Center in Sialkot is dedicated to offering comprehensive eye exams and treatments free of charge, aiming to prevent vision loss and enhance our patients' quality of life.
                        </p>
                    </div>
                </div>
            </div>
</div>
</div>
</section>
