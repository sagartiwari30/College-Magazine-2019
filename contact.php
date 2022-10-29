<?php
	
	try{
	$pdo=new pdo('mysql:host=localhost;dbname=contact','root','');
	session_start();
	$user_name=$_POST['user_name'];
	$user_mobile=$_POST['user_mobile'];
	$user_email=$_POST['user_email'];
	$user_message=$_POST['user_message'];
	
	$insert=$pdo->prepare("insert into contact_info(user_name,user_mobile,user_email,user_message)values(:user_name,:user_mobile,:user_email,:user_message)");

	$insert->bindparam(':user_name',$user_name);
	$insert->bindparam(':user_mobile',$user_mobile);
	$insert->bindparam(':user_email',$user_email);
	$insert->bindparam(':user_message',$user_message);
	
	$insert->execute();
	
	}
	catch(PDOException $f){
		echo$f->getmessage();
	}
	
	header('location:contact.html');
?>
