
<?php


include 'form_validation.php';//include form validation file
include 'db_actions.php';//include database file
if(isset($_POST['login'])) //check login button is clicked or not
{
    //fname,lname,dob,email,password,repassword,gender,age,qual,specialization,experience
    $data = $_POST;
   
    if(isNull($data))
    {
      die("Data is null");
    }
    else
    {
     // die("Data is not null");
    
   
   $email= $_POST['email'];
   $password= $_POST['password'];//$password,$repassword
   $role= $_POST['role'];
     
                                                       

if(isEmpty($email)||isEmpty($password)||isEmpty($role))
{
   
   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error!</strong> Fields should not empty. Please try again.
   <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
}
else
{
   // die($email.$password.$role)  ;  
// Start the session
session_start();
    if($role==="admin")
    {
        if($email==="admin@admin.com" && $password==="Password@vu")
        {
            $_SESSION["user_id"] =$email;
            
            header('Location:http://localhost/eyecare/admin/index.php');//admin main page
        }
    }


    if(isValidUser($email,$password,$role))
         {
            $_SESSION["user_id"] =$email;

            if($role==="doctor")
            {
                
                    header('Location:http://localhost/eyecare/doctor/index.php');//doctor main page
                
            }
            if($role==="patient")
            {
                
                    header('Location:http://localhost/eyecare/patient/index.php');//patient main page
                
            }
         }
         else{
           
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Enter valid email/Data of Birth and or passwrod. Please try again.
            <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';

         }

  
}
    }

}


?>


<?php
include 'includes/header.php';//include footer
?>
   
   <?php
include 'includes/main_navbar.php';//include footer
?>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Login</h3>
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Date of birth/ email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="role" class="form-label">User Type</label>
                        <select class="form-control" class="form-select" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name ="login" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <?php
    
include 'includes/footer.php';//include footer
?>