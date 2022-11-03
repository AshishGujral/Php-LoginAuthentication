<?php

class User {

    //Properties
    private $id=0;
    private $full_name = "";
    private $email = "";
    private $password = "";
    public  $avatar_name="";
    private $affiliation="";
    private $guild_name="";
	private $picture="";


    //Setters
    function getId(): int{
        return $this->id;
    }
    function getfull_name(): String{
        return $this->full_name;
    }
    function getemail(): String{
        return $this->email;
    }
    function getpassword(): String{
        return $this->password;
    }
    function getavatar_name(): String{
        return $this->avatar_name;
    }
    function getaffiliation(): String{
        return $this->affiliation;
    }
    function getguild_name(): String{
        return $this->guild_name;
    }
    function getpicture(): String{
        return $this->picture;
    }

    //Getters
    function setId(int $id){
        $this->id = $id;
    }
    function setfull_name(string $fullname){
        $this->full_name = $fullname;
    }
    function setemail(string $e){
        $this->email = $e;
    }
    function setpassword(String $p){
        $this->password = $p;
    }
    function setavatar_name(string $d){
        $this->avatar_name = $d;
    }
    function setaffiliation(String $af){
        $this->affiliation = $af;
    }
    function setguild_name(String $g){
        $this->guild_name = $g;
    }
    function setpicture(String $pic){
        $this->picture = $pic;
    }


    //Verify the password
    function verifyPassword(string $passwordToVerify):bool {
        //Return a boolean based on verifying if the password given is correct for the current user

        return password_verify($passwordToVerify, $this->password);

    }
}



?>