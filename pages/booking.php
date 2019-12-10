<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Reservation");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../includes/header.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Book it!'){
	$email = trim($_POST['email']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	echo "<strong><em>Dear $fname, Thank you for reservation!</em></strong>";
}

?>
     <section class="container">

	    <article class="text-alignCenter">
			<h1 >Make a table reservation!</h1>
			<!--<p class="text-bold">GET PIZZA EMAILS!</p>-->
			<!--<p>We offer you the best reservation services!</p>-->
	    	<!--<p>Did someone say "It is my Birthday"?</p>
-->
	    </article>


 		<article class="contactForm fullWidthForm outlineStyle mt ml mr">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formReg">
                   <fieldset class="fieldsetStyle">
                       <legend class="legendStyle">Book a table!</legend>
                           <div class="grid column2">
                           	  <ul class="formInput ml mr">
								<li>
									<label for="fname">First Name*:</label>
									<input type="text" id="fname" name="fname" required>
								</li>
								<li>
									<label for="lname">Last Name*:</label>
									<input type="text" id="lname" name="lname" required>
								</li>
								<li>
									<label for="guest" >Number of Guest</label>
									<input type="number"  min="1" name="guest" value="1" id="guest" required>
															   </li>
								<li>
									<label for="email">Email*:</label>
									<input type="email" id="email" name="email" required placeholder="name@url.com">
								</li>
								<li>
									<label for="phone">Phone:</label>
									<input type="tel" id="phone" name="phone" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter the valid phone number. Example: 555-555-5555">
								 </li>
								</ul>
								<ul class="formInput ml mr">
								   <li>
									  <label>Location*</label>
									  <select required>
											<option value="">-Select-</option>
											<option value="92128">Rancho Bernardo</option>
											<option value="92108">Mission Valley</option>
											<option value="92037">La Jolla</option>
											<option value="92014">Del Mar</option>
											<option value="92107">Point Loma</option>
									 </select>
								   </li>
								   <li>
										<ul class="grid col2-all">
											<li>
												<label for="date_res">Date*:</label>
												<input type="date" id="date_res" name="date_res" required >
											</li>
											<li>
												<label for="time_res">Time*</label>
												<input type="time" id="time_res" name="time_res" value="19:00" required>
											</li>
										</ul>
									</li>
				 					<li>
										<label for="suggestions">Suggestions</label>
										<textarea name="suggestions" placeholder="E.g No of Plates, How you want the setup to be"></textarea>
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

					</ul> <!-- end form input -->
                    </div>

                          <p class="formNote">* indicates required field</p>
                   </fieldset>

					 <ul class="formBtn">
                      <!-- <li>
                           <input type="reset" class="btn button">
                       </li>-->
                       <li>
                           <input type="submit" name="submit" class="btn button" value="Book it!">
                       </li>
                   </ul>
           </form>
        </article>
	 </section>
<a id="bttBtn" href="#booking"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
<?php
	include('../includes/footer.php');
?>
