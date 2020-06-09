<?php
// If there is no constant defined called __CONFIG__, do not load this
// Include the DB.php file;
include_once "DBconfig/DB.php";
$con = DB::getConnection();
    echo "Add a new Project";
?>
