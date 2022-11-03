<?php

class Validate {

    static $valid = array();
    // create a function to validate the registration form
    // Please use filter to validate the inputs whenever possible    
    static function ValidateForm(){
        if (!filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL))
        {
        self::$valid[]= "Please enter a valid email address ";
        }
    // What to validate?
    
    // Email should be email format

    // password
        // should be a 5 digits string
        // both password and password confirm needs to be exactly similar
        if($_POST['password']!=$_POST['password2'])
        {
            self::$valid[]="\nPassword doesn't match";
        }
        if(strlen($_POST['password'])<6)
        {
            self::$valid[]="\nPassword length not less than 5";
        }
    
    // Full Name should not be empty and cannot be numbers
        // Also replace occurences of semicolon, colon, comma, ampersand, 
        // dollar sign, < and > and any improper character with nothing
        if(!preg_match("/^[a-zA-Z'-]+$/",$_POST['fullName']))
        {
            self::$valid[] = "\nPlease Enter a valid Name";
        }

    // Avatar name should not be empty
        if(strlen($_POST['avatar'])==0){
            self::$valid[]="\nPlease Enter a valid Avatar Name";
        }
    // Guild name should not be empty
    if(strlen($_POST['guild'])==0){
        self::$valid[]="\nPlease Enter a valid Guild Name";
    }
    // One of the affiliation should be selected
    if($_POST['affiliation']== 'Select...')
    {
        self::$valid[] = "\nPlease Select the Affiliation!";
    }
    // One of the avatar images must be chosen
    if (!isset($_POST['picture']))
    {
        self::$valid[] = "\nPlease choose the Avatar image";
    }
    // validation for check avatar with the same email exist or not
    // firstly get the user data use session loggedin and use if condition to check
    $user=UserDAO::getUser($_SESSION['loggedin']);

   if($_POST['email']==$user->getemail() && $_POST['picture']== $user->getpicture())
   {
    self::$valid[] = "\n Same avatar in this email already exist Please choose the different avatar";
   }
   
   if($_POST['email']==$user->getemail() && $_POST['avatar']==$user->getavatar_name())
   {
    self::$valid[] = "\n Same avatar name in this email already exist Please choose the unique avatar name";
   }
    // the function should update the page's notifications
    Page::$notifications[]=self::$valid;
    // you can also return some value to the calling function
    }
    
}



?>