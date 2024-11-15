<?php
/////////////////////welcome page db_action

 include 'config/config.php';//include config file


function SaveDoctorPersonalInfo($fname, $lname, $dob, $email, $password, $gender, $age, $qual, $specialization, $experience)
{
  global $con; // Declare $con as a global variable
    
    $dates = date("d/m/Y");
    
    // Insert data into the 'users' table
    $query = "INSERT INTO `users`(`first_name`, `last_name`, `birthday`, `email`, `password`, `gender`, `age`, `dates`, `role`, `status`) 
              VALUES ('$fname','$lname','$dob','$email','$password','$gender','$age','$dates','doctor','valid')";
    $result1 = mysqli_query($con, $query); // Execute the query and store the result

   
    // Check if both queries were successful
    if ($result1) 
    {
        return true;//save
    } else 
    {
        return false;//not save
    }
}



function SaveDoctorExperiencelInfo($email, $qual, $specialization, $experience, $imgContent)
{
    try
    {

    
  global $con; // Declare $con as a global variable
    
 
       // Insert data into the 'doctors' table
    $query2 = "INSERT INTO `doctors`(`doctor_id`, `qualification`, `specialization`, `experience`, `is_available`,`photo`) 
               VALUES ('$email','$qual','$specialization','$experience','yes','$imgContent')";
    $result2 = mysqli_query($con, $query2); // Execute the query and store the result

    // Check if both queries were successful
    if ($result2) 
    {
        return true;//save
    } else 
    {
        return false;//not save
    }
}
catch (Exception $e) 
   {
    
    echo $e;
    }
}




function SavePatientInfo($fname, $lname, $dob, $email, $password, $gender, $age, $address,$problem,$certificate_no,$image)
{
    global $con; // Declare $con as a global variable
    
    $dates = date("Y/m/d");
    
    // Insert data into the 'users' table
    $query = "INSERT INTO `users`(`first_name`, `last_name`, `birthday`, `email`, `password`, `gender`, `age`, `dates`, `role`, `status`) 
              VALUES ('$fname','$lname','$dob','$email','$password','$gender','$age','$dates','patient','pending')";
    $result1 = mysqli_query($con, $query); // Execute the query and store the result

    // Insert data into the 'doctors' table
    $query2 = "INSERT INTO `patients`(`patient_id`, `addres`, `problem`, `remarks`, `image`, `certificate_no`, `certificate_status`) 
    VALUES ('$email','$address','$problem','ok','$image','$certificate_no','pending')";
    $result2 = mysqli_query($con, $query2); // Execute the query and store the result

    // Check if both queries were successful
    if ($result1 && $result2) {
        return true;//save
    } else {
        return false;//not save
    }
}


function isValidUser($email,$password,$role)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `users` 
    WHERE `birthday`='$email' or `email`='$email'and `password`='$password' and `role`='$role' and status='valid' ";
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) 
    {
       return true;//user is valid
    }
    return false; //user is invalid
}
//////Contact us table
function sendContactUsMessage($name,$to,$from,$message)
{
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `contactus`(`name`, `to_email`, `from_email`,  `message`) VALUES ('$name','$to','$from','$message')";
    $result1 = mysqli_query($con, $query); 
   
    if ($result1) 
    {
        return true;//save
    } else {
        return false;//not save
    }
}
function viewServices()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `ourservice` LIMIT 3";
    return $result = $con->query($query);
   
}
function viewAllServices()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `ourservice`";
    return $result = $con->query($query);
   
}
function viewAboutUs()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `aboutus`";
    return $result = $con->query($query);
   
}
function viewLabTest()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `labtests` LIMIT 3";
    return $result = $con->query($query);
   
}
function viewAllLabTest()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `labtests`";
    return $result = $con->query($query);
   
}

function viewDoctors()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `doctors`,users where role='doctor' and email=doctor_id LIMIT 3";
    return $result = $con->query($query);
   
}
function viewAllDoctors()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `doctors`,users where role='doctor' and email=doctor_id LIMIT 3";
    return $result = $con->query($query);
   
}
function searchDoctor($name)
{
global $con; // Declare $con as a global variable
$query="SELECT * FROM `doctors`,users where role='doctor' and email=doctor_id and first_name LIKE'%$name%' or last_name LIKE'%$name%'";
return $result = $con->query($query);
}
//patient reviews
function saveReviews($user_id,$doctor_id,$message)
{
    global $con; // Declare $con as a global variable
    
     
    // Insert data into the 'users' table
    $query = "INSERT INTO `reviews`(`user_id`, `doctor_id`, `message`) VALUES ('$user_id','$doctor_id','$message')";
    $result1 = mysqli_query($con, $query); // Execute the query and store the result

   
    // Check if both queries were successful
    if ($result1) 
    {
        return true;//save
    } else 
    {
        return false;//not save
    }
}
function showAllreviews()
{
    global $con; // Declare $con as a global variable
    $query= "SELECT * FROM `reviews` , users WHERE reviews.user_id=users.email group by user_id";
    return $result = $con->query($query);

}