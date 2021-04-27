<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Menu");
	include('../includes/connect.php');
	include '../functions/cartfunctions.php';
	include('../includes/header.php');

?>
	<h1 class="text-alignCenter">What We Offer</h1>
	<section class="grid doubleSides">
		<article class="middleText noMin">
			<a href="specials.php" class="button sides" title="click to view weekly specials"><img src="<?php echo "$rootPath"; ?>images/pizza-demo-bg.jpg" alt="pizza image" class="img-responsive">Weekly Specials</a>
		</article>

		<article id="containerSearch" class="withinPage noMin">
			<section id="searchArea">
					<label for="search">Live Search</label>
					<p>Enter the name or info about a product</p>
					<input type="search" name="search" id="search" placeholder="name or info">
			 </section>

   		</article>
		<article class="middleText noMin">
			<a href="order.php" class="button sides" title="click to order by category"><img src="<?php echo "$rootPath"; ?>images/sandwich-h1.jpg" alt="sandwich image" class="img-responsive">Order By Category</a>
		</article>
	</section>
	<section>
			<article id="update"></article>
	</section>
	<!--<section class="grid doubleSides">
		<article class="middleText">
			<a href="specials.php" class="btn button">Weekly Specials</a>
		</article>
		<article class="gallery noMin">
			<h1 class="text-alignCenter">What We Offer</h1>
		</article>
		<article class="middleText">
			<a href="order.php" class="btn button">Order by Category</a>
		</article>
	</section>
   <section>

       <div id="containerSearch" class="withinPage">
			<section id="searchArea">
					<label for="search">Live Search</label>
					<p>Enter the name or info about a product</p>
					<input type="search" name="search" id="search" placeholder="name or info">
			 </section>
			 <section>
					<article id="update"></article>
			 </section>
      </div>
	</section>-->

    <div class="tab-container">
		<ul class="tabs">
		<li data-tab="tab-0">Breakfast</li>
		<li data-tab="tab-1">Lunch</li>
		<li data-tab="tab-2">Dinner</li>
		<li class="current" data-tab="tab-3">All</li>
	</ul>


	 <?php
		    $menuType = ['Breakfast','Lunch','Dinner','All'];
            /* day of the week 3 letters: echo date("D"); */
            $weekday = date("D");

				$i = 0;
				while ($i < 4) {
				   	if ($i == 3) {
						echo '<div id="tab-'.$i.'" class="tab-content current clearfloat">';
					} else {
						echo '<div id="tab-'.$i.'" class="tab-content clearfloat">';
					}
					echo '<section class="gallery text-alignCenter">';

					$prod_sql = $dbh->prepare("SELECT * FROM sp19_products WHERE menutype = '$menuType[$i]';");
					$prod_sql->execute();

						while ($row = $prod_sql->fetch()){
						   $prod_id = $row['prodid'];
						   $prod_name = $row['prodname'];
						   $prod_desc = $row['proddesc'];
						   $prod_price = $row['prodprice'];
						   $prod_img = $row['image'];
						   $prod_link = $row['link'];
                           $prod_wsale = $row['weeklyspecial'];

						  //echo "$prod_name - $prod_desc - $prod_price - $prod_img <br>";
						If ($i == 3) {
							$prod_sql = $dbh->prepare("SELECT * FROM sp19_products;");
							$prod_sql->execute();

						while ($row = $prod_sql->fetch()){
						   $prod_id = $row['prodid'];
						   $prod_name = $row['prodname'];
						   $prod_desc = $row['proddesc'];
						   $prod_price = $row['prodprice'];
						   $prod_img = $row['image'];
						   $prod_link = $row['link'];
                           $prod_wsale = $row['weeklyspecial'];

                           echo '<div class="card-container">';

                           if ($prod_wsale == $weekday) { echo '<div class="ribbon">Sale</div>';
                               echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn topcut">';}
                           else {
                           	   echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn">';}

						   echo '<div>';
								echo '<p>'.$prod_name.'</p>';

                                if ($prod_wsale == $weekday) {
                                       echo '<p> reg $'.$prod_price.', sale<span class="price">$'.discount20($prod_price).'</span></p>';}
                                else {
                                       echo '<p class="price">$'.$prod_price.'</p>';};
							    /*echo '<p class="price">$'.$prod_price.'</p>';*/

							   /*	echo '<a href="#" class="btn button ">Add to Cart!</a>';*/
							   /* echo '<a class="btn button" href="products.php?prodid='.$prod_id.'" title="click to see more">Order Now!</a>';*/
							   echo '<a class="btn button" href="'.$rootPath.$prod_link.'" title="click to see more">Order Now!</a>';
							echo '</div>';
						echo '</div>';
						}


						} else {

						 echo '<div class="card-container">';
						   echo '<div>';
                            if ($prod_wsale == $weekday) { echo '<div class="ribbon">Sale</div>';
                               echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn topcut">';}
                           else {
                           	   echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn">';}
				           /*echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn">';*/
						   echo '</div>';
						   echo '<div>';
								echo '<h3>'.$prod_name.'</h3>';

                                 if ($prod_wsale == $weekday) {
                                       echo '<p> reg $'.$prod_price.', sale<span class="price">$'.discount20($prod_price).'</span></p>';}
                                else {
                                       echo '<p class="price">$'.$prod_price.'</p>';};

							    /*echo '<h3 class="price">$'.$prod_price.'</h3>';*/

							   	/*echo '<p>'.$prod_desc.'</p>
								<a href="#" class="btn button ">Add to Cart!</a>';*/
							    echo '<a class="btn button" href="'.$rootPath.$prod_link.'" title="click to see more">Order Now!</a>';
							echo '</div>';
						echo '</div>';
						}
						} // end while

   	   				$i++;
					echo '</section>';
					echo '</div>';
				}
	?>


</div> <!-- end div tab-container -->


<a href="custom-pizza.php" class="btn button">Build your own Custom Pizza</a>

<!--<a id="bttBtn" href="#menuPage"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>-->

<?php
	include('../includes/footer.php');
?>
