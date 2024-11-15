
<?php

include 'form_validation.php';//include config file
include 'db_actions.php';//include config file
if(isset($_POST['signup'])) //check signup button is clicked or not
{
    //fname,lname,dob,email,password,repassword,gender,age,address,problem,certificate_no,image
    $data = $_POST;
    if(isNull($data))
    {
      die("Data is null");
    }
    else
    {
     // die("Data is not null");
    
   $fname= $_POST['fname'];
   $lname= $_POST['lname'];
  $dob = $_POST['dob'];
   $email= $_POST['email'];
   $password= $_POST['password'];//$password,$repassword
   $repassword= $_POST['repassword'];
   $gender= $_POST['gender'];
   $age= $_POST['age'];
   $address = $_POST['address'];
   $problem= $_POST['problem'];  
   $certificate_no= $_POST['certificate_no'];     
                                                                    

if(isEmpty($fname)||isEmpty($lname)||isEmpty($dob)||isEmpty($email)||isEmpty($password)||isEmpty($repassword)||isEmpty($gender)||isEmpty($age)||isEmpty($certificate_no)||isEmpty($problem))
{
   die("Fields should not empty");
}
else
{
   if(isPasswordMached($password,$repassword))
   {
     
      if(isValidPassword($password)&&isValidEmail($email))
      {
         
        
        if (!empty($_FILES["image"]["name"]))
        {
             // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));


 
 if(SavePatientInfo($fname, $lname, $dob, $email, $password, $gender, $age, $address,$problem,$certificate_no,$imgContent))
 {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>  You are registered successfully.
                <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
 }
}
else{

 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>Error!</strong> Password or Email formate is not corract. Please try again.
 <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

        


        }
        }
        
        
        
       
 
 
   }
   else
   {
    
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Password dose not matched with Retype password. Please try again.
      <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     }
     
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
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Patient Registration</h3>
            </div>
            <div class="card-body">
                <form action="patient_registration.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fname" class="form-label">Patient First Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Patient Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last name" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="repassword" class="form-label">Retype Password:</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter your password again" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="undefined">Undefined</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                    </div>
                    <div class="mb-3">
                        <label for="problem" class="form-label">Problem:</label>
                        <input type="text" class="form-control" id="problem" name="problem" placeholder="Enter your problem" required>
                    </div>
                    <div class="mb-3">
                        <label for="certificate_no" class="form-label">Clearance Certificate No:</label>
                        <input type="text" class="form-control" id="certificate_no" name="certificate_no" placeholder="Clearance Certificate No" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Clearance Certificate:</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
include 'includes/footer.php';//include footer
?>