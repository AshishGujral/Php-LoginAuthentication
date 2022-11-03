<?php

class LoginManager  {

    //This function checks if the user is logged in, if they are not they are redirected to the login page
    static function verifyLogin()   {

        // Check for a session
        

            //Start it up
            if(session_id()=='' && !isset($_SESSION)){
                session_start();
            }
    
            if(isset($_SESSION['loggedin'])){
                return true;
            }
            else{
                session_destroy();
                return false;
            }
    
        // If there is session data

            //The user is loggedin, return true

        // Else
            //The user is not logged in
            //Destroy any session just in case            

            //Send them back to the login page using header

            //return false

        // End else
        
    }
        
    
}

?>