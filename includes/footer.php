  <a id="bttBtn" href="<?php $_SERVER['PHP_SELF'] ?>"><img src="<?php echo "$rootPath"; ?>images/back-to-top-arrow.png" alt="back to top arrow"></a>
  <footer class="footer styleAccord">
   <section class="grid column4">
   	<article>
		<p>VISIT US</p>
  		<form action="#" id="locFooter">
             <label for="location">Find a Restaurant:</label>
                    <select name="location" id="location">
                        <option value="">- Please select -</option>
                        <option value="RB">Rancho Bernardo</option>
                        <option value="MV">Mission Valley</option>
                        <option value="LJ">La Jolla</option>
                        <option value="DM">Del Mar</option>
                        <option value="PL">Point Loma</option>
                     </select>
		</form>
  		<p>We offer so much to love!</p>
  		<!--<a href="order.html" class="btn button ">Order Online</a>-->

   	</article>
   	<article>
   		<ul>
   		<!--	<li><a href="#" class="btn button">Download our app</a></li>-->
   			<li><a href="<?php echo "$rootPath"; ?>pages/liveSearch.php" class="btn button" title="search by name or product info">Site Search</a></li>
   			<li><a href="<?php echo "$rootPath"; ?>pages/order.php" class="btn button" title="order for delivery or carryout">Order Online</a></li>
   			<li><a href="<?php echo "$rootPath"; ?>pages/booking.php" class="btn button" title="reserve your table">Reservation</a></li>
   		</ul>
   		<p class="callMsg mt">Call Now to order<br>
   		888-999-9999</p>



   	</article>
   	<article>
   		<p>HOURS:</p>
   		<ul class="displayInline">
   				<li>Mon - Thu 8AM til 10PM</li>
   				<li>Sat - Sun 10AM til 9PM</li>
   		</ul>
   		<ul class="displayInline mt">
  				<li> <a href="<?php echo "$rootPath"; ?>pages/order.php" title="order by category">Order</a></li>
  				<li> <a href="<?php echo "$rootPath"; ?>pages/custom-pizza.php" title="build your own pizza">Build</a></li>
  				<li> <a href="<?php echo "$rootPath"; ?>pages/booking.php" title="book a reservation for your party">Parties</a></li>
   		</ul>
   		<ul class="displayInline">
   				<li> <a href="<?php echo "$rootPath"; ?>pages/menuPage.php" title="our menu">Menu</a></li>
   				<li> <a href="<?php echo "$rootPath"; ?>pages/specials.php" title="weekly specials">Specials</a></li>
   				<li> <a href="<?php echo "$rootPath"; ?>pages/contact.php" title="contact us">Contact</a></li>
   		</ul>

   	</article>
   	<article>
   		<p>Get Pizza Emails!</p>
		<p>We'll keep you in the loop on the latest deals!
		</p>
  	<a href="<?php echo "$rootPath"; ?>pages/newsletter.php" class="btnCall button" title="sign up for newsletter">Sign Me Up!</a>
   	</article>

   <!-- <article>
              <p>Sign up for our Newsletter! </p>
              <form action="#" method="post" id="signup">
                    <ul>
                          <li>
                              <label for="name">First Name:*</label>
                              <input type="text" id="name" name="name" required>
                          </li>

                          <li>
                              <label for="email">Email:*</label>
                              <input type="email" id="email" name="email" required placeholder="name@url.com">
                          </li>

                          <li>
                              <input type="submit" value="Sign Up" class="submitBtn">
                          </li>
                      </ul>
               </form>
            </article>
   	-->

   </section>
   <article>
   		<p>Follow Us on Social Media</p>
   		<div class="social mb">
   			<a href="https://www.facebook.com" target="_blank" title="facebook"><i class="fab fa-facebook"></i></a>
   			<a href="https://www.instagram.com" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
			<a href="https://www.twitter.com" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
		    <a href="https://www.yelp.com" target="_blank" title="yelp"><i class="fab fa-yelp"></i></a>
		   <!--	<a href="#"><i class="fab fa-google-plus"></i></a>-->
   		</div>
   		<p>&copy; <?php echo '  ' . date("Y") . ' '?>Sofia's Pizza</p>
   		<!--<?php date_default_timezone_set('America/Los_Angeles');
      	      echo date("h:i:s");
        ?>-->

   	</article>


</footer>
 </main>
</div>
</body>
</html>
