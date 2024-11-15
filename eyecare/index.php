<?php
include 'includes/header.php';//include footer
include 'includes/main_navbar.php';//include footer
include 'db_actions.php';//include database file
 //`name`, `to_email`, `from_email`,  `message`
 
 if(isset($_POST['send'])) //check contactus button is clicked or not
{
    $name= $_POST['name'];
   $to_email= "admin@admin.com";
   $from_email= $_POST['from_email'];
   $message= $_POST['message'];
   $saveData=sendContactUsMessage($name,$to_email,$from_email,$message);

   if($saveData)
   {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your message has been submitted successfully.
          <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
   }  

}

?>

   <!-- Hero Section -->
<section class="hero text-white text-center d-flex align-items-center justify-content-center" style="height: 100vh; background-image: url('hospital.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <h1 class="display-4">Book Your Appointment Today</h1>
        <p class="lead">Easy and fast appointment booking with top doctors.</p>
        <a href="login.php" class="btn btn-sm btn-dark">Book Now</a>
    </div>
</section>

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
            <!-- Our Services Card -->
                    
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                    <i class="fa fa-modx"></i>
                        <h5 class="card-title">Our Services</h5>
                        <p class="card-text">
                         
                        </p>
                        <ul class="list-group">
                       
                        <?php
                        //our services
             $service=viewServices();
              if ($service && $service->num_rows > 0) 
                        
                        {
                            
                            while ($rowService = $service->fetch_assoc()) 
                            { ?>
                            <li class="list-group-item list-group-item-action list-group-item-primary" >
                            <?php echo $rowService['service_name']?>
                            </li>
                            
                           

                            <?php
     }
    }?>
                        </ul>
                        <a href="allService.php" class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-right"></i> View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Lab test Section -->
    <section id="services" class="py-5 text-center">
        <div class="container">
            <div class="row">
                <?php //lab tests
                $labs=viewLabTest();

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
                         <a href="allTest.php" class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-right"></i> View All Available Lab Tests</a>    
            </div>
        </div>
    </section>

   <!-- Doctors Section -->
<section id="doctors" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Meet Our Eye Specialist</h2>
        <div class="row">
            <?php
           $doctors= viewDoctors();
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
        <a href="allDoctors.php" class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-right"></i> View More</a> 
    </div>
</section>
        
       
    <!-- Patient Reviews Section -->
    <section id="reviews" class="py-5 text-center">
        <div class="container">
            <h2>What Our Patients Say</h2>
            <div id="carouselReviews" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <p class="mb-0">"Dr. John Doe is amazing! He took the time to explain everything and made me feel at ease."</p>
                            <footer class="blockquote-footer">Jane Doe</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-0">"Dr. Jane Smith has been fantastic with my child. He’s caring and very knowledgeable."</p>
                            <footer class="blockquote-footer">Mark Johnson</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-0">"I couldn’t be happier with the surgery performed by Dr. Emily White. He’s a true professional."</p>
                            <footer class="blockquote-footer">Sarah Lee</footer>
                        </blockquote>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselReviews" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselReviews" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->

   

    <section id="contactus" class="bg-light py-5">
        <div class="container text-center">
            <h2>Contact Us</h2>
            <form class="mt-4" action="index.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" id="from_email" name="from_email" class="form-control" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="message" name="message" placeholder="Your message !" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control">
                    </div>
                </div>
                <button type="submit" name="send" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <?php
include 'includes/footer.php';//include footer
?>