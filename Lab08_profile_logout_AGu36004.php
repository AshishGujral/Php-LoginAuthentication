<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOWrapper.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");
//Start the session
session_start();
// If no form is submitted
if(!isset($_POST['submit']))
{
    if(LoginManager::verifyLogin())
    {
        UserDAO::init();
        $user = UserDAO::getUser($_SESSION['loggedin']);
        Page::header();
        Page::displayUserProfileSection($user);
    }
    else{
        header('Location: Lab08_login_AGu36004.php');
    }
}


if(isset($_POST['submit']))
{
    UserDAO::init();
    $user = UserDAO::getUser($_SESSION['loggedin']);

    $_SESSION['loggedin']=$user->getavatar_name();
    Page::header();
    Page::displayLogoutSection();
    unset($_SESSION); 
    session_destroy();
    
    Page::footer();
}

    // Verify the Login

        //Initialize the user DAO

        //Get the current user thats logged in

        //Display page' element corresponding to the user details
    
    // if login is not verified, redirect to the login page

// else 
    // unser the session
    // destroy the session
    // display logout page's elements



?>