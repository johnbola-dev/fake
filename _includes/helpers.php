<?php 
    //Global Variables
    $rootDir = $_SERVER['SERVER_NAME'];

    
    //Database init
    //  require_once("connection.php");
    // $database = new Connection();
	// $db = $database->open();


    //Sanitizer
    function clean($input)
    {
        return htmlentities($input, ENT_QUOTES, 'UTF-8');
    }
?>