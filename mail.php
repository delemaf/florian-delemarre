<?php
	
	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/
	
	$data['error'] = false;
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if( empty($name) ){
		$data['error'] = "S'il vous plaît entrez votre nom.";
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = "S'il vous plaît entrer une adresse e-mail valide.";
	}else if( empty($subject) ){
		$data['error'] = "S'il vous plaît entrer votre sujet.";
	}else if( empty($message) ){
		$data['error'] = 'Le champ de message est requis!';
	}else{
		
		$formcontent="From: $name\nSubject: $subject\nEmail: $email\nMessage: $message";
		
		
		$recipient = "florian.delemarre@epitech.eu";
		
		$mailheader = "From: $email \r\n";
		
		if( mail($recipient, $name, $formcontent, $mailheader) == false ){
			$data['error'] = "Désolé, une erreur s'est produite!";
		}else{
			$data['error'] = false;
		}
	
	}
	
	echo json_encode($data);
	
?>