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
            $services=viewAllServices();
            

            if ($services && $services->num_rows > 0) 
                    
                    {
                      //`name`, `details
                        while ($rowServices = $services->fetch_assoc()) 
                        { ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                    <i class="fa fa-modx"></i>
                        <h3 class="card-title"> <?php echo $rowServices['service_name']?></h3>
                        <p class="card-text"><?php echo $rowServices['description']?></p>
                       
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
