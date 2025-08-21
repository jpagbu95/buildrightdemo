<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'hr@buildrightconstruction.com.ph';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'buildrightconstruction.com.ph',
    'username' => 'hr@buildrightconstruction.com.ph',
    'password' => 'HRconstruction...',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);
  $contact->add_attachment('resume', 20, array('pdf'));
  if($_POST['privacy'] !='accept') {
     die('Please, accept our terms of service and privacy acy policy');
    }
  
  echo $contact->send();
?>
