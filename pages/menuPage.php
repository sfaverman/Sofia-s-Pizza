<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Menu");
	include('../includes/connect.php');
	include '../functions/cartfunctions.php';
	include('../includes/header.php');

?>
	<section class="grid doubleSides">
		<article class="middleText">
			<a href="specials.php" class="btn button">Weekly Specials</a>
		</article>
		<article class="gallery noMin">
			<h2 class="text-alignCenter">What We Offer</h2>
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
	</section>

    <div class="tab-container">
		<ul class="tabs">
		<li data-tab="tab-0">Breakfast</li>
		<li data-tab="tab-1">Lunch</li>
		<li data-tab="tab-2">Dinner</li>
		<li class="current" data-tab="tab-3">All</li>
	</ul>


	 <?php
		    $menuType = ['Breakfast','Lunch','Dinner','All'];

				$i = 0;
				while ($i < 4) {
				   	if ($i == 3) {
						echo '<div id="tab-'.$i.'" class="tab-content current clearfloat">';
					} else {
						echo '<div id="tab-'.$i.'" class="tab-content clearfloat">';
					}
					echo '<section class="gallery text-alignCenter">';

					//echo "$weekDayArray[$i]";

					$prod_sql = $dbh->prepare("SELECT * FROM sp19_products WHERE menutype = '$menuType[$i]';");
					$prod_sql->execute();

						while ($row = $prod_sql->fetch()){
						   $prod_name = $row['prodname'];
						   $prod_desc = $row['proddesc'];
						   $prod_price = $row['prodprice'];
						   $prod_img = $row['image'];

						  //echo "$prod_name - $prod_desc - $prod_price - $prod_img <br>";
						If ($i == 3) {
							$prod_sql = $dbh->prepare("SELECT * FROM sp19_products;");
							$prod_sql->execute();

						while ($row = $prod_sql->fetch()){
						   $prod_name = $row['prodname'];
						   $prod_desc = $row['proddesc'];
						   $prod_price = $row['prodprice'];
						   $prod_img = $row['image'];
						   echo '<div class="card-container">';
						   /*echo '<div>';*/
						   echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn">';
						  /* echo '</div>';*/
						   echo '<div>';
								echo '<p>'.$prod_name.'</p>';
							    echo '<p class="price">$'.$prod_price.'</p>';
							   	echo '<a href="#" class="btn button ">Add to Cart!</a>';
							echo '</div>';
						echo '</div>';
						}


						} else {

						 echo '<div class="card-container">';
						   echo '<div>';
								  echo '<img src="../images/products/'.$prod_img.'.jpg" alt="'.$prod_img.'" class="img-responsive zoomIn">';
						   echo '</div>';
						   echo '<div>';
								echo '<h3>'.$prod_name.'</h3>';
							    echo '<h3 class="price">$'.$prod_price.'</h3>';
							   	echo '<p>'.$prod_desc.'</p>
								<a href="#" class="btn button ">Add to Cart!</a>';
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


<a href="customOrder.html" class="btn button">Build your own Custom Pizza</a>

<a id="bttBtn" href="#menuPage"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>

<?php
	include('../includes/footer.php');
?>
