<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Contact");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../includes/header.php';

?>

     <section class="grid column2-md container">

	    <article>
			<h1>Contact</h1>
			<p class="text-bold">Please give us your feedback!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

	    </article>
 		<article class="contactForm fullWidthForm outlineStyle mt">
            <form action="handle_feedback.php" method="post" id="feedback">
                   <fieldset class="fieldsetStyle">
                       <legend class="legendStyle">Contact Information</legend>
                               <ul class="formInput">
                                   <li>
                                       <label for="fName">First Name*:</label>
                                       <input type="text" id="fName" name="firstName" required>
                                   </li>
                                   <li>
                                       <label for="lName">Last Name*:</label>
                                       <input type="text" id="lName" name="lastName" required>
                                   </li>

                                   <li>
                                       <label for="email">Email*:</label>
                                       <input type="email" id="email" name="email" required placeholder="name@url.com">
                                   </li>
								   <li>
									   <label for="phone">Phone:</label>
									   <input type="tel" id="phone" name="phone" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter the valid phone number. Example: 555-555-5555">
								   </li>
                                   <li>
                                       <label for="questions">Questions/Comments:*</label>
                                       <textarea name="questions" id="questions" placeholder="Please write your message here" required></textarea>
                                   </li>
                                   <li>
										<label for="preferred">Preferred way to contact you:*</label>
										<ul id="radioList" name="preferred" class="grid col3-all text-alignCenter">
											<li>
												<label for="emailYes">
													<input type="radio" name="contMethod" id="emailYes" value="email" required checked>E-mail</label>
											</li>
											<li>
												<label for="phoneYes">                                   <input type="radio" name="contMethod" id="phoneYes" value="phone">Phone</label>
											</li>
											<li>
												<label for="textYes">
												<input type="radio" name="contMethod" id="textYes" value="text">Text</label>
											</li>
										 </ul>
									 </li>
								</ul>
                          <p class="formNote mt">* indicates required field</p>
                   </fieldset>


                   <ul class="formBtn">
                       <li>
                           <input type="reset" class="btn button">
                       </li>
                       <li>
                           <input type="submit" class="btn button" value="Let's Go!">
                       </li>
                   </ul>
           </form>
        </article>
	 </section>
<?php
	include('../includes/footer.php');
?>
