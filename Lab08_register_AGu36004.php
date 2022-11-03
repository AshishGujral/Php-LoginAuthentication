<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOWrapper.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");

//Check if the form was posted
if(!empty($_POST))
{
    
    UserDAO::init();
    session_start();
    $user = UserDAO::getUser($_POST['email']);
    var_dump($user->getemail());
    var_dump($user->getavatar_name());
    
   // $user1 = UserDAO::getUser($_SESSION['loggedin']);
  //  var_dump($user);
   // var_dump($user1);
    
    if($user== true)
    {
        $_SESSION['loggedin']=$user->getemail();
        var_dump($user->getemail());
        var_dump($user->getavatar_name());
        Validate::ValidateForm();
    }
    else{
        $_SESSION['loggedin'] = $_POST['email'];
    }
    
    
    if(empty(Page::$notifications[0]))
    {
        UserDAO::init();
        $u = new User();
        $hashedpassword= password_hash($_POST['password'],PASSWORD_DEFAULT);
        $u->setemail($_POST['email']);
        $u->setpassword($hashedpassword);
        $u->setfull_name($_POST['fullName']);
        $u->setavatar_name($_POST['avatar']);
        $u->setguild_name($_POST['guild']);
        $u->setaffiliation($_POST['affiliation']);
        $u->setpicture($_POST['picture']);
        UserDAO::createUser($u);
        header('Location: Lab08_login_AGu36004.php');
    }
    unset($_SESSION); 
    session_destroy();
   
}

    // If the form entries are valid
        // initialize the DAO

        // instantiate a new user
        // assemble the user data
        // create the user
        // send the user to the login page
    
Page::header();
Page::displayRegistrationSection();
Page::footer();

// Display the page elements and registration form (with updated page notifications if any)


?>