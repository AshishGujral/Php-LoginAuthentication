<?php

// set the folder path for the image files
define("IMAGES",'./images/');
define("DB_HOST","localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "lab08_002");
define("DB_PORT", 3308);

// Set all the database things! double check with the PDOService class and your database 
define('LOGFILE','log/error_log.txt');
ini_set('log_errors', true);
ini_set('error_log',LOGFILE);

// Set the error log things!

?>