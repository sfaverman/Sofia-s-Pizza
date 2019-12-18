<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Order Confirmation");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../includes/header.php';

//  script: confirmation.php
//	This is paypal return url after paypent is successful, user returns to this page

/* This displays the content of the $_POST superglobal array
	if any post data has been sent.
	$_POST is a superglobal, which is an associative array
	The print_r() function allows you to inspect the contents
	of arrays and is used for debugging purposes.
	The <pre> tags simply makes the output easier to read
*/
?>
<pre>
	<?php print_r($_POST); ?>
</pre>


<?php
//Print the Confirmation - Thank you:
print '<section class="feedback"><p> Thank you for your order. </p>
<p>We appreciate your business.</p>
<p>The order confirmation email will be sent to you shortly.</p>
<p>If any questions regarding the order, please call our customer support at 999-999-9999</p></section>';


/*
echo '<a id="bttBtn" href="#confirmation"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';
*/
include('../includes/footer.php');
?>
