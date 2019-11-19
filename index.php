<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Home Page");
    include 'includes/connect.php';
	include 'functions/cartfunctions.php';
	include 'includes/header.php';

?>
     	     	<section id="home1" class="grid column4">
 			<article>
 				<h3>Pizzas</h3>
				<a href="pages/order.php?category=Pizzas">
 				  <img src="images/pizza-h1.jpg" alt="pizza image" class="img-responsive">
 				</a>
 				<p> We make the most Delious Pizzas!
					You will try once - You will come many more times! </p>
 			</article>
 			<article>
 				<h3>Sandwiches</h3>
 				<a href="pages/order.php?category=Sandwiches">
 				  <img src="images/sandwich-h1.jpg" alt="sandwich image" class="img-responsive">
				</a>
 				<p> We take the time and effort to make your sandwich the best you'll ever have. Try our most popular sandwiches.</p>

 			</article>
 			<article>
 				<h3>Salads</h3>
 				<a href="pages/order.php?category=Salads">
 				   <img src="images/salad-h1.jpg" alt="salad image" class="img-responsive">
				</a>
 				<p> Straight from the garden, fresh, delicious, made just for you. Our salads make eating greens more fun. </p>
 			</article>
 			<article>
 				<h3>Desserts</h3>
 				<a href="pages/order.php?category=Desserts">
 				   <img src="images/pancake-h1.jpg" alt="pancakes image" class="img-responsive">
				</a>
 				<p> Treat yourself with Sofia's Pizza  desserts and beverages. Whether in the mood for ... Come by Today!</p>
 			</article>
 		</section>

      	<section id="home2" class="grid doubleSides">
      		<article class="middleText">
      			<a href="pages/menu.php" class="btn button">Our Menu</a>
      		</article>
 			<article class="gallery">
 				<h3>ORDER ONLINE FOR PICKUP OR DELIVERY</h3>
 			</article >
 			<article class="middleText">
      			<a href="pages/order.php" class="btn button">Start Order</a>
      		</article>
 		</section>

 		<section id="home3" class="grid column4">

 			<article>
 				<h4>THIS WEEK</h4>
 				<img src="images/pizza-h2.jpg" alt="pancakes image" class="img-responsive">
 				<a href="pages/specials.php" class="btn button ">VIEW SPECIALS</a>
 			</article>
 			<article>
 				<h4>REWARDS</h3>
 				<img src="images/rewards-h2.jpg" alt="rewards image" class="img-responsive" >
 				<a href="#" class="btn button ">VIEW REWARDS</a>
 			</article>
 			<article>
 				<h4>CUSTOM PIZZA</h4>
 				<img src="images/custom-pizza-h2.jpg" alt="pizza plate image" class="img-responsive">
 				<a href="pages/customOrder.html" class="btn button ">BUILD PIZZA</a>
 			</article>
 			<article>
 				<h4>PARTY SPECIALS</h4>
 				<img src="images/party-h2.jpg" alt="pancakes image" class="img-responsive">
 				<a href="pages/order.php" class="btn button ">ORDER NOW!</a>
 			</article>

 		</section>
 		<section id="home4" class="grid column3">
 			<article>
 				<h3>About Us</h3>
 				<p> The Sofia's Pizza Inc., founded in 1988, is a Midwestern fast casual restaurant chain. Sofia's Pizza offers pizza, chicken,  salads, appetizers, beverages and desserts.</p>

				<p>Quality is at our core. It’s the foundation we started with, from the first Sofia's Pizza that was made in San Diego, CA and now more than 100 locations in the California.. </p>
				<a href="#" class="btn button ">Learn More</a>
 			</article>
 			<article>
 				<h3>Our Customers Say</h3>
				<blockquote><p><i>…”Fantastic freshly prepared pizzas cooked in the sweet tear drop caravan – the new Brockham start up.  Delicious!” - May 2018</i></p> </blockquote>

				<blockquote>
					<p><i>…”Best pizzas we have ever tasted - well done guys!!” - September 2018</i></p>
				</blockquote>

				<blockquote>
					<p><i>…”Absolutely delicious pizza. Great work team!”<br>  - September 2018</i></p>
				</blockquote>
				<a href="#" class="btn button ">Show More</a>
 			</article>
 			<article>
 				<h3>Best Italian Parties</h3>
 				<img src="images/bistro-498504_640.jpg" alt="restaurant room image" class="img-responsive">
 				<p>Are you ready to host your event or birthday party at Sofia's Pizza?</p>
 				<a href="pages/order.html" class="btn button ">Book now!
 				</a>

 			</article>
 		</section>

 	 <a id="bttBtn" href="#home"><img src="images/back-to-top-arrow.png" alt="back to top arrow"></a>
<?php
	 include('includes/footer.php');
?>
