<?php
//define different functions for form validation
function isNull($data)
{
    if($data==null)
    {
        return true;
    }
    else{
        return false;
    }
}

//is empty
function isEmpty($data)
{

   if( empty($data))
   {
    return true;
  }
else
{
    return false;
}
}

//is matched
function isPasswordMached($pw,$rpw)
{

   if( $pw===$rpw)
   {
    return true;
  }
else
{
    return false;
}
}


//is valid full name
function isValidFullName($name)
{
    $regex = '/^[a-zA-Z\s]{3,100}$/';//regular expression
   if( preg_match($regex , $name))
   {
    return true;
  }
else
{
    return false;
}
}



//is valid first name
function isValidUserName($ame)
{
    $regex = '/^[a-zA-Z0-9]{8,100}$/';//regular expression
   if( preg_match($regex , $name))
   {
    return true;
  }
else
{
    return false;
}
}

//is valid Email
function isValidEmail($email)
{
    if (empty($email)) 
    {
      return false;
    } 
    else
     {
      $email1 = $email;
  if (!filter_var($email1, FILTER_VALIDATE_EMAIL))//ali@gmail.com
  {
    return false;
  }
  else {return true;}
}
}
//is valid Mobile
function isValidMobile($mobil)
{
//mobile no validation

if(preg_match('/^[0-9]{10}+$/', $mobile)) {
    $mobileErr= "valid";
    } 
    else
     {
        $mobileErr=" Invalid Phone Number";
    }

}
//is valid Password
function isValidPassword($password)
{
// Validate password strength
$reg='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/';
if (preg_match($reg, $password))
 {
    return true;
} 
else 
{
    return false;
}

}

?>