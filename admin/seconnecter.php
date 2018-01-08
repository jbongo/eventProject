<?php
session_start();

if(isset($_POST['login']) && isset($_POST['password']) ){
	


	if(!empty($_POST['login']) && !empty($_POST['password'])){

		
		
		if($_POST['login'] == "admin" && $_POST['password'] == "admin"){
			$_SESSION['admin'] = true;
			$_SESSION['login'] = true;
			header('location:index.php');
		}
		else{
			header('location:login.php?login=fail');
		}
	}
}
else{
			header('location:login.php?login=fail');
		}

?>