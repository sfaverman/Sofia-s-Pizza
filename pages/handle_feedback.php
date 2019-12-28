<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Handle Feedback");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../includes/header.php';

//  script: handle_feedback.php
//	This page receives the data from contact.html.php
//  It will receive: name, phone, email and comments and submit in $_POST


/* $_POST is case sensitive
 * Must match the name attribute values from the form
*/
/*print_r($_POST);*/
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "sofiasd@yahoo.com";
    $email_subject = "Email from Sofia's Pizza website";

    function died($error) {
        // your error code can go here
		echo '<section class="feedback">

        <p>We are very sorry, but there were error(s) found with the form you submitted.</p>
        <p>These errors appear below.</p>
        <p><strong>'.$error.'</strong></p>
        <p>Please go back and fix these errors.</p></section>';

		echo '<a id="bttBtn" href="#handle_feedback"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';
		include('../includes/footer.php');
        die();
	}


    // validation expected data exists
    if(!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['email']) ||
        /*!isset($_POST['phone']) ||*/
        !isset($_POST['questions'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $fName = $_POST['firstName']; //required
	$lName = $_POST['lastName'];  //required
	$email = $_POST['email'];     //required
	$phone = $_POST['phone'];
	$comments = $_POST['questions']; //required
	$contMethod = $_POST['contMethod']; //required

	switch ($contMethod) {
    case "phone":
        $method = "call you at $phone";
        break;
    case "email":
		$method = "email you at $email";
        break;
    case "text":
		$method = "text you at $phone";
        break;
    default:
        echo "Your preferred contact method is neither phone, email, nor text!";
    }

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$fName)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$lName)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  $phone_exp = "/[0-9]{3}-[0-9]{3}-[0-9]{4}/";

  if(!preg_match($phone_exp,$phone) && ($contMethod === 'phone' || $contMethod === 'text')) {
    $error_message .= 'The Phone Number you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($fName)."\n";
    $email_message .= "Last Name: ".clean_string($lName)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telephone: ".clean_string($phone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);


//Print the received data:
print '<section class="feedback"><p> Thank you, <strong>'.$fName.' '.$lName.'</strong>, for your comments. </p>
<p>We appreciate your feedback:<br><em>'.$comments.'</em></p>
<p>Your feedback is very important for us.</p>
<p>Please allow us 24-48 hours to '.$method.'</p></section>';


/* This displays the content of the $_POST superglobal array
	if any post data has been sent.
	$_POST is a superglobal, which is an associative array
	The print_r() function allows you to inspect the contents
	of arrays and is used for debugging purposes.
	The <pre> tags simply makes the output easier to read

<pre>
	<?php print_r($_POST); ?>
</pre>

*/

}

/*echo '<a id="bttBtn" href="#handle_feedback"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';*/
include('../includes/footer.php');
?>
