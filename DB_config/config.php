<?php

	// If there is no constant defined called __CONFIG__, do not load this file
	if(!defined('__CONFIG__')) {
		exit('You do not have a config file');
	}

  // Include the DB.php file;
	include_once "DB.php";
  $con = DB::getConnection();
?>
