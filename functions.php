<?php
	
	require ('database/DBController.php');
	// Product class
	require ('database/class.product.php');
	// Cart class
	require('database/class.cart.php');
	// User class
	require('database/class.user.php');
	// Orders class
	require('database/class.orders.php');
	// Order details class
	require('database/class.odetails.php');


	// DBController object - folosit pentru conexiunea la baza de date 'proiect'
	$db = new DBController();


	// Product object
	$product = new Product($db);

	// print_r($product->getData());

	// Cart object
	$cart = new Cart($db);

	// User object
	$user = new User();

	// Orders object
	$orders = new Orders();

	// Order Details object
	$odetails = new ODetails();

?>