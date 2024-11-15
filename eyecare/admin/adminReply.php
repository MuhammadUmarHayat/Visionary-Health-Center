<?php
include 'db_actions.php';

$result=viewAdminMessage();
global  $to_email;
global $message;
if (isset($_GET['id']) && isset($_GET['msg'])) 
{
     $to_email = $_GET['id'];
     $message= $_GET['msg'];

}

if(isset($_POST['send'])) //check contactus button is clicked or not
{
     $to_email=$_POST['to_email'];
    $message=$_POST['message'];

   // die($to_email.$message);
    $name="Admin";
   
   $from_email= "admin@admin.com";
 
   $saveData=sendContactUsMessage($name,$to_email,$from_email,$message);

   if($saveData)
   {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your message has been submitted successfully.
          <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
   }  

}



include '../includes/header.php';//include footer

include '../includes/admin_navbar.php';//include footer
?>
<section id="contactus" class="bg-light py-5">
    <div class="container text-center">
        <h2>Contact Us</h2>
        <form class="mt-4" action="adminReply.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <b>From:</b> <?php echo $to_email?>
                    <input type="hidden" id="to_email" name="to_email" value="<?php echo $to_email?>">
                </div>
                <div class="form-group col-md-6">
                    <b>Query:</b> <?php echo $message?>
                    <input type="hidden" id="message" name="message" value="<?php echo $message?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <b>Reply: </b>
                    <input type="text" class="form-control" id="message" name="message" placeholder="Your reply!" required>
                </div>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>


    <?php
include '../includes/footer.php';//include footer
?>