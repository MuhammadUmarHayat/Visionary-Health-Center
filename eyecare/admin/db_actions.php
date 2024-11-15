<?php
//admin database functionalities
        include '../config/config.php';//include config file

 function saveCertification($email,$imgContent,$certificate_no,$cer_date,$cer_status)
 {
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `certifications`( `patient_id`, `image`, `certification_no`, `certification_date`, `status`) 
    VALUES ('$email','$imgContent','$certificate_no','$cer_date','$cer_status')";  
 $result=mysqli_query($con, $query);
 if ($result)
  {
    return true;
} else {
    return false;
}
 
 }
 function showPatientsList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT 
    p.patient_id,   
    p.problem, 
    p.certificate_status As account_status, 
    c.image AS certificate_image, 
    p.certificate_no, 
    IF(c.certification_no IS NOT NULL, 'Valid Certificate', 'Not Valid Certificate') AS certificate_status
FROM 
    patients p
LEFT JOIN 
    certifications c 
ON 
    p.certificate_no = c.certification_no";
    $result = $con->query($query);
    return $result;
}
function showCertificiationList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM `certifications`";
    $result = $con->query($query);
    return $result;
}

function isCertificateValid($id)
{
    global $con; // Declare $con as a global variable
    $query = "Select * from `patients`  where `patient_id`='$id'";
    $result=mysqli_query($con, $query);
    if ($result && $result2) {
        return true;
    } else {
        return false;
    }
    
}
function updateCertification($id,$status)
{
    global $con; // Declare $con as a global variable
    $query = "update  `patients` set `certificate_status`= '$status' where `patient_id`='$id'";
    $result=mysqli_query($con, $query);
    $result2;
    //update users table
           
    $query2 = "update  `users` set `status`= '$status' where `email`='$id'";
    $result2=mysqli_query($con, $query2);

    

if ($result && $result2) {
    return true;
} else {
    return false;
}
}

function updateCertificateDetail($id,$patient_id,$img,$certification_no,$status)
{
    global $con; // Declare $con as a global variable
    $query = "UPDATE `certifications` SET `patient_id`='$patient_id',`image`='$img',`certification_no`='$certification_no',`status`='$status' WHERE `id`='$id'";
    $result=mysqli_query($con, $query);
    $result2;
    //update users table
           
    $query2 = "update  `users` set `status`= '$status' where `email`='$id'";
    $result2=mysqli_query($con, $query2);

    

if ($result && $result2) {
    return true;
} else {
    return false;
}
}


function getCertificationInfo($id)
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `certifications` where id='$id'";
    $result = $con->query($query);
    return $result;
}
function deleteCertificate($id)
{
    global $con; // Declare $con as a global variable
    $query = "delete from `certifications` where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}

function showAppointmentList()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT * FROM  `appointments`";
    $result = $con->query($query);
    return $result;
}
function updateAppointmentStatus($id,$status)
{
    global $con; // Declare $con as a global variable
    $query = "update  `appointments` set `status`= '$status' where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
function deleteAppointment($id)
{
    global $con; // Declare $con as a global variable
    $query = "delete from `appointments` where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
function saveAppointment($patient_id,$doctor_id,$app_date,$app_time,$status)
{
    //patient_id,doctor_id,$app_date,app_time,status
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `appointments`( `patient_id`, `doctor_id`, `app_date`, `app_time`, `status`) 
    VALUES ('$patient_id','$doctor_id','$app_date','$app_time','$status')";
$result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}

function saveLabTest($name,$details,$photo,$status)
{
    //patient_id,doctor_id,$app_date,app_time,status
    global $con; // Declare $con as a global variable
    $query="INSERT INTO `labtests`( `name`, `details`, `photo`, `status`) VALUES ('$name','$details','$photo','$status')";
$result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
function updateLabTest($testId, $name, $details, $imgContent, $status)
{
      global $con; // Declare $con as a global variable
    $query=" UPDATE `labtests` SET `name`='$name',`details`='$details',`photo`='$imgContent',`status`='$status' WHERE `id`='$testId'";
$result=mysqli_query($con, $query);
if ($result) 
{
    return true;
} else {
    return false;
}
}
function deletelab($id)
{
    global $con; // Declare $con as a global variable
    $query = "delete from `labtests` where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}

function getAllLabTests()
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From `labtests`"); 
    return $records;

}
function getLabTestById($testId)
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From `labtests` where `id`=$testId"); 
    return $records;


}
function getPatient()
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From users where role='patient'"); 
    return $records;

}
function getDoctor()
{   global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From users where role='doctor'"); 
    return $records;

}
//Aggregated functions

function totalDoctors()
{
    global $con; // Declare $con as a global variable
    $query = "SELECT COUNT(*) AS doctor_count FROM users WHERE role='doctor'";
    $result = mysqli_query($con, $query);
    
    if ($result) 
    {
        $row = mysqli_fetch_assoc($result);
        return $row['doctor_count'];//total doctors
    } else {
        // Handle the error appropriately
        return 0; // or false, or throw an exception
    }
}
function totalPatients()
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS pat_count FROM users WHERE role='patient'";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['pat_count'];//total patients
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
    }
    function totalAppointments()
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS app_count FROM `appointments`";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['app_count'];//total appointments
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
    }

    function totalCertifications()
{
    
        global $con; // Declare $con as a global variable
        $query = "SELECT COUNT(*) AS cer_count FROM `certifications`";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['cer_count'];//total certifications
        } else {
            // Handle the error appropriately
            return 0; // or false, or throw an exception
        }
}
function saveAboutUs($title,$description)
{

    global $con; // Declare $con as a global variable
    $query="INSERT INTO `aboutus`( `title`, `description`) VALUES ('$title','$description')";
$result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}

}
function getAboutUsDetails()
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From `aboutus`"); 
    return $records;

}
function deleteAboutUs($id)
{
    global $con; // Declare $con as a global variable
    $query = "delete from `aboutus` where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
function getAboutUsInfo($id)
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From `aboutus` where `id`='$id'"); 
    return $records;
}
function updateAboutUsInfo($id,$title,$description)
{
     //die($id.$title.$description);
      global $con; // Declare $con as a global variable
    $query="UPDATE `aboutus` SET `title`='$title',`description`='$description' WHERE `id`='$id'";
$result=mysqli_query($con, $query);
if ($result) 
{
    return true;
} else {
    return false;
}
}
/////our Services
function saveService($service_name,$description)
{

    global $con; // Declare $con as a global variable
    $query="INSERT INTO `ourservice`( `service_name`, `description`) VALUES ('$service_name','$description')";
$result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}

}
function getAllservices()
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From `ourservice`"); 
    return $records;

}
function deleteService($id)
{
    global $con; // Declare $con as a global variable
    $query = "delete from `ourservice` where `id`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} else {
    return false;
}
}
function getServiceInfo($id)
{
    global $con; // Declare $con as a global variable
    $records = mysqli_query($con, "SELECT * From `ourservice` where `id`='$id'"); 
    return $records;
}
function updateServiceInfo($id,$service_name,$description)
{
     //die($id.$title.$description);
      global $con; // Declare $con as a global variable
    $query="UPDATE `ourservice` SET `service_name`='$service_name',`description`='$description' WHERE `id`='$id'";
$result=mysqli_query($con, $query);
if ($result) 
{
    return true;
} else {
    return false;
}
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
function viewAdminMessage()
{
    global $con; // Declare $con as a global variable
    //SELECT * FROM chat_messages ORDER BY timestamp ASC
   // $query = "SELECT * FROM  `contactus` WHERE `to_email` = 'admin@admin.com' ORDER BY `created_at` DESC";
    $query = "SELECT * FROM  `contactus` WHERE `to_email` = 'admin@admin.com' ORDER BY `created_at` ASC";
   return $result = $con->query($query);
   
}
