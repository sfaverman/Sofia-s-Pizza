<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Newsletter Sign Up");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../functions/newsletter-func.php';
	include '../includes/header.php';

//newsletter subscription
if (isset($_POST['submit']) && $_POST['submit'] == 'Subscribe'){
	$email = trim($_POST['email']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$bday = trim($_POST['bday']);
	subscribe($email,$fname,$lname,$bday);
}
//unsubscribe
if (isset($_POST['submit']) && $_POST['submit'] == 'Unsubscribe'){
	$email = $_POST['email'];
	unsubscribe($email);
}

// create an array of subscribers from a file
//print_r(file('../subscribers.txt'));


?>

     <section class="grid column2-md container">

	    <article>
			<h1>Sign up for our Newspaper!</h1>
			<!--<p class="text-bold">GET PIZZA EMAILS!</p>-->
			<p>We'll keep you in the loop on the latest news, events, openings, and all things delicious!</p>
	    	<p>Be the first to know about any special Sofia's Pizza coupons and enjoy a FREE appetizer just for signing up</p>
	    	<p>Did someone say "Birthday Suprise" too?</p>

	    </article>


 		<article class="contactForm fullWidthForm outlineStyle mt">
            <form action="" method="post" id="formReg">
                   <fieldset class="fieldsetStyle">
                       <legend class="legendStyle">Sign up!</legend>
                               <ul class="formInput">
                                   <li>
                                       <label for="fname">First Name*:</label>
                                       <input type="text" id="fname" name="fname" required>
                                   </li>
                                   <li>
                                       <label for="lname">Last Name*:</label>
                                       <input type="text" id="lname" name="lname" required>
                                   </li>

                                   <li>
                                       <label for="email">Email*:</label>
                                       <input type="email" id="email" name="email" required placeholder="name@url.com">
                                   </li>
                                   <li>
                                   	   <label for="bday">Birthday*:</label>
                                       <input type="date" id="bday" name="bday" required >
                                   </li>

                               </ul>
                          <p class="formNote">* indicates required field</p>
                   </fieldset>


                   <ul class="formBtn">
                       <li>
                           <input type="submit" class="btn button" name="submit"  value="Subscribe">
                       </li>
                       <li>
                           <input type="submit" class="btn button" name="submit" value="Unsubscribe">
                       </li>
                   </ul>
           </form>
        </article>
	 </section>
<?php
	include('../includes/footer.php');
?>
