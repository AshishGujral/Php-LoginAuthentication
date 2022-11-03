<?php

class Page  {

    public static $heading = "Change MEEEE!!";
    public static $studentID=300336004;
    public static $studentName="Ashish Gujral";
    public static $notifications;

    
    static function header() { ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="bambang">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <section>
            <h1>Lab 08 - <?php echo self::$studentName; echo "(";echo self::$studentID;echo")"; ?></h1> 
        </section>
          
    <?php }

    
    static function footer()    { ?> 
        </body>
    </html>        

    <?php }

    
    static function displayUserProfileSection(User $user) { ?>
     <!-- profile section -->
     <section>
            <div>                              
                <form action="" method="post">
                    
                    <div>
                        <div>
                            <h2><?php echo "Hi ". $user->getavatar_name()?></h2>
                            <p>Full Name: <strong><?php echo $user->getfull_name()?></strong></p>
                            <p>Email Address: <strong><?php echo $user->getemail()?></strong></p>
                            <p>Affiliation: <strong><?php echo $user->getaffiliation()?></strong></p>
                            <p>Guild Name: <strong><?php echo $user->getguild_name()?></strong></p>
                            <input type="hidden" name="avatar" value="">
                            <p><input type="submit" name="submit" value="Logout"></p>
                        </div> 
                        <img src="images/<?php echo $user->getpicture();?>.png" width="50%">                                               
                    </div>
                </form>
            </div>
            
        </section>
        
    <?php }

    
    static function displayLoginSection() { ?>
     <!-- login section -->        
     <section>
            <div>                
                <form action="" method="post">
                    <h2>Please Sign in</h2>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" autofocus required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login">
                    </div>
                    <p class="error"><?php echo Page::$notifications[0]?></p>
                    <p>Don not have an account? Please <a href="Lab08_register_AGu36004.php">register</a></p>                
                </form>
            </div>
        </section>
    
    <?php }

    
    static function displayRegistrationSection() { ?>
      <!-- register section -->
      <section>
            <div>
                <p>Have an account? Please <a href="Lab08_login_AGu36004.php">login</a></p>                
                <p class="error"> <br><?php
                 if(Page::$notifications!=null){
                    foreach(Page::$notifications as $notice){
                        foreach($notice as $value){
                            echo $value;
                            ?><br><?php
                        }
                        }
                       
                    }?>
                    </p>
                <form action="" method="post">
                    <h2>Please fill the form</h2>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" placeholder="Email address for login" autofocus required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <label for="password">Password confirm</label>
                        <input type="password" name="password2" placeholder="Password confirm" required>
                    </div>
                    <div>
                        <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" placeholder="FullName" required>
                    </div>
                    <div>
                        <label for="avatar">Avatar Name</label>
                        <input type="text" name="avatar" placeholder="Avatar Name" required>
                    </div>
                    <div>
                        <label for="avatar">Guild Name</label>
                        <input type="text" name="guild" placeholder="Guild Name" required>
                    </div>
                    <div>
                        <label for="affiliation">Affiliation</label>
                        <select name="affiliation" required>
                            <option value="neutral">Neutral</option>
                            <option value="chaos">Chaos</option>
                            <option value="good">Good</option>
                            <option value="evil">Evil</option>
                        </select>                        
                    </div>
                    <div>
                        <label for="image">Avatar Image</label>
                        
                        <span>
                            <input type="radio" name="picture" value="picture1"><img src="images/picture1.png">
                            <input type="radio" name="picture" value="picture2"><img src="images/picture2.png">                    
                            <input type="radio" name="picture" value="picture3"><img src="images/picture3.png">
                            <br>                            
                            <input type="radio" name="picture" value="picture4"><img src="images/picture4.png">
                            <input type="radio" name="picture" value="picture5"><img src="images/picture5.png">
                            <input type="radio" name="picture" value="picture6"><img src="images/picture6.png">
                        </span>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>
            </div>
        </section>
    
    <?php }

    static function displayLogoutSection(){?>
       <!-- Logout section -->
       <section>                  
            <div>                
                <h2>Thank you for your visit <?php echo $_SESSION['loggedin']; echo "!";?></h2>
            </div>
        </section>
    <?php
            
    }

}