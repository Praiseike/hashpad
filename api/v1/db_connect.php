<?php

    $dbname = "hashpad";
    $dbhost = $_SERVER['HTTP_HOST'];
    $dbuser = "root";
    $dbpass = "";

    
    $db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    
?>