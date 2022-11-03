<?php

class UserDAO   {

    // Create a member to store the PDO agent
    static private $db;
    // create the init function to start the PDO wrapper
    static function init(){
        self::$db = new PDOWrapper("User");
    }
    // function to create user
    static function createUser(User $user){
        // make sure the strings being stored in the database are cleaned 
        // and trimmed
          $insert ="INSERT INTO user(id, password, email, full_name, avatar_name, affiliation, guild_name, picture)
                    VALUES (:id, :password, :email, :full_name, :avatar_name, :affiliation,:guild_name,:picture)";

        // prepare the statment
        self::$db->query($insert);
        // bind the parameters
        self::$db->bind(':id',$user->getId());
        self::$db->bind(':password',$user->getpassword());
        self::$db->bind(':email',$user->getemail());
        self::$db->bind(':full_name',$user->getfull_name());
        self::$db->bind(':avatar_name',$user->getavatar_name());
        self::$db->bind(':affiliation',$user->getaffiliation());
        self::$db->bind(':guild_name',$user->getguild_name());
        self::$db->bind(':picture',$user->getpicture());
        // QUERY BIND EXECUTE 
        self::$db->execute();
        // You may want to return the last inserted id
        return self::$db->rowCount();

        // query
        // bind
        // execute
        // you may return the rowCount

    }

    // get user detail
    static function getUser(string $email)  {
        
        // you know the drill
        // return the single result query
        $sql = "SELECT * from user WHERE email=:email";
        self::$db->query($sql);
        self::$db->bind(":email", $email);
        self::$db->execute();
        
        return self::$db->singleResult();

    }

    // update the current user profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function updateUser(string $email)    {

        // you know the drill
        // you may return the rowCount        

    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getUsers()  {

        // you know the drill
        // return the multiple result query    

    }
    
    
}