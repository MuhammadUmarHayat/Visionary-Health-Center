<?php
include 'includes/header.php'; //include header
include 'includes/main_navbar.php'; //include main navbar
include 'db_actions.php'; //include database file

?>
<!-- Services Section -->
<section id="services" class="py-5 text-center">
    <div class="container">
        <div class="row">
            <?php //lab tests
            $labs=viewAllLabTest();
            

            if ($labs && $labs->num_rows > 0) 
                    
                    {
                      //`name`, `details
                        while ($rowLabs = $labs->fetch_assoc()) 
                        { ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                    <i class="fa fa-hospital-o"></i>
                        <h5 class="card-title"> <?php echo $rowLabs['name']?></h5>
                        <p class="card-text"><?php echo $rowLabs['details']?></p>
                       
                    </div>
                </div>

            </div> 
            <?php
                        }
                    }
                    ?>       
        </div>
    </div>
</section>



<?php include 'includes/footer.php'; ?>
