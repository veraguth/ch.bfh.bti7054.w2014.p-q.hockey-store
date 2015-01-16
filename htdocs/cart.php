<?php
session_start();
if(isset($_GET['num']) && isset($_GET['artId'])){
	$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
	$key = $_GET['artId'].$_GET['groesse'];
	if(!isset($cart[$key])){
		$cart[$key] = 0;
		$cart[$key] = 0;
	}
	if(isset($_GET['action']) && $_GET['action'] == 'add'){
		$cart[$key] += $_GET['num'];
	} else if(isset($_GET['action']) && $_GET['action'] == 'remove'){
		$cart[$key] -= $_GET['num'];
		if($cart[$key] <= 0){
			unset($cart[$key]);
		}
	}
	if(count($cart) == 0){
		unset($cart);
	}
	$_SESSION['cart'] = $cart;
	
	header('HTTP/1.1 303 See Other');
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>