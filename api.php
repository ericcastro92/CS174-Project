<?php
	/**
	API for CS174, to be used for communicating with database
	Usage [GET Request]:
	dir/api.php?func=[function]&args=[args]
	-Supply args as an array
	-Supply blanks args array if function does not require any arguments
	*/

	if(!isset($_Get['func'])){
		print 'Error: Provide function';
		exit(0);
	}

	if(!isset($_Get['args'])){
		print 'Error: Provide arguments';
		exit(0);
	}

	//Get user args and function
	$user_function = $_GET['func'];
	$args = $_GET['args'];

	function login($email, $password){

	}
?>