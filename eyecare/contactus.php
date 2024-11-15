
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