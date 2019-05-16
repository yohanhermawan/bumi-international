<?php

// Define some constants
define( "RECIPIENT_NAME", "Yohan Hermawan" );
define( "RECIPIENT_EMAIL", "info@bumi-international.com" );


// Read the form values
$success = false;
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ($senderEmail && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . " <" . $senderEmail . ">";
  $msgBody = " Subscribe";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: index.html?message=Success');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Error');	
}

?>