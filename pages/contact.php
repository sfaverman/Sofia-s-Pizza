<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Contact");
	include('../includes/header.php');
?>

     <section class="grid column2-md container">

	    <article>
			<h1>Contact</h1>
			<p class="text-bold">Please give us your feedback!</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

	    </article>
 		<article class="contactForm fullWidthForm outlineStyle mt">
            <form action="" method="post" id="formReg">
                   <fieldset class="fieldsetStyle">
                       <legend class="legendStyle">Contact Information</legend>
                               <ul class="formInput">
                                   <li>
                                       <label for="fName">First Name*:</label>
                                       <input type="text" id="fName" name="firstName" required>
                                   </li>

                                   <li>
                                       <label for="email">Email*:</label>
                                       <input type="email" id="email" name="email" required placeholder="name@url.com">
                                   </li>

                                   <li>
                                       <label for="msg">Questions/Comments:</label>
                                       <textarea name="message" id="msg" placeholder="Please write your message here"></textarea>
                                   </li>
                               </ul>
                          <p class="formNote">* indicates required field</p>
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
