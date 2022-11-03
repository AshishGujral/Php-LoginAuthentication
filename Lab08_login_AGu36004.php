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

    //Initialize the DAO
    UserDAO::init();
   
    //Get the current user 
        $user=UserDAO::getUser($_POST['email']);
    //if there is no such user, update the page notifications
    if(!$user)
    {
        Page::$notifications[]="User Doesn't exist";
    }
    else{
    if($user->verifyPassword($_POST['password'])){
        session_start();
        $_SESSION['loggedin']= $user->getemail();
    }
    else
    {
        Page::$notifications[]="Wrong username or password";
    }

    if(LoginManager::verifyLogin()){
        $user = UserDAO::getUser($_SESSION['loggedin']);
        header('Location: Lab08_profile_logout_AGu36004.php');
    }}
    
}
    
    //otherwise, check the DAO returned an object of type user

        //Verify the password with the posted data
        
            //Start the session
            
            //Set the user to logged in. Remember, the username is email address 
            
            //Use header to send the user to the user profile page
Page::header();
Page::displayLoginSection();
Page::footer();
            
// Display the page element
?>