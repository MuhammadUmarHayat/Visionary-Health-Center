<?php
//patient database functionalities

include '../config/config.php';//include config file

function showAppointments($patient_id)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `appointments` where patient_id='$patient_id'";
    $result = $con->query($query);
    return $result;
}
function showUserProfile($email) 
{//SELECT u.*, p.* FROM users u JOIN patients p ON u.email = 'p1@gmail.com' WHERE u.role = 'patient'
    global $con; // Declare $con as a global variable
    
       $query = "
        SELECT u.*, p.*
        FROM users u
        JOIN patients p ON u.email = '$email'
        WHERE  u.role = 'patient'
    ";
    $result = $con->query($query);
    return $result;
}
function updateProfile( $email,$first_name,$last_name,$birthday,$gender,$age,$addres,$problem, $remarks)
{
    global $con; // Declare $con as a global variable
     // Update the user's information in the database
     $query="UPDATE users 
     SET first_name = '$first_name', last_name = '$last_name', birthday = '$birthday', gender = '$gender', age = '$age' 
     WHERE email = '$email' ";
     $result=mysqli_query($con, $query); //execute query

 // Update the patient's information in the database
 $query2 = "
     UPDATE patients 
     SET addres = '$addres', problem ='$problem', remarks = '$remarks'
     WHERE patient_id = '$email'
 ";
 $result2=mysqli_query($con, $query2); //execute query
 if ($result && $result2) {
    return true;
    } else {
    return false;
    }
}

function showDoctorList()
{
    global $con; // Declare $con as a global variable

    // Prepare the SQL query
    $query="
        SELECT 
            d.doctor_id, 
            d.qualification, 
            d.specialization, 
            d.experience, 
            d.is_available,
            u.first_name, 
            u.last_name, 
            u.email, 
            u.gender, 
            u.age 
        FROM 
            doctors d
        JOIN 
            users u 
        ON 
            u.email = d.doctor_id
        WHERE 
            u.role = 'doctor'
    ";
    
    $result = $con->query($query);
    return $result;
}

function showDoctor($doctor_id)
{
    global $con; // Declare $con as a global variable

    // Prepare the SQL query
    $query="
        SELECT 
            d.doctor_id, 
            d.qualification, 
            d.specialization, 
            d.experience, 
            d.is_available,
            u.first_name, 
            u.last_name, 
            u.email, 
            u.gender, 
            u.age 
        FROM 
            doctors d
        JOIN 
            users u 
        ON 
            u.email = d.doctor_id
        WHERE 
            u.role = 'doctor'
            AND (d.doctor_id = '$doctor_id' OR u.first_name = '$doctor_id') ";
    
    $result = $con->query($query);
    return $result;
}



function showDrAvailableSlots($email) 
{
    global $con; // Declare $con as a global variable
    
    // Prepare the SQL query with error handling
    $query=" SELECT * FROM `doctor_available_slots` WHERE `doctor_id` = '$email' AND `status` = 'available'";
    
    $result = $con->query($query);
    return $result;
}

function sendAppointmentRequest($patient_id, $doctor_id, $app_date, $app_time, $status)
{
    global $con; // Declare $con as a global variable
$query="INSERT INTO `appointments`( `patient_id`, `doctor_id`, `app_date`, `app_time`, `status`)
 VALUES ('$patient_id','$doctor_id','$app_date','$app_time','$status')";
$result=mysqli_query($con, $query);
if ($result)
 {
    return true;
} else 
{
    return false;
}
}

function showDrInfo($id)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `doctor_available_slots` WHERE `id`='$id'";
    $result = $con->query($query);
    return $result;
}

?>
