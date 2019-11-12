<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Order");
	include('../includes/header.php');
    include('../includes/connect.php');

/* if link from home page section 1 */
if(isset($_GET['category'])) {
		$show_categ = $_GET['category'];
		//echo "Show Category $show_categ";
} else {
		$show_categ = 'N';
}

?>
<main class="galWrapper">

	<section class="grid doubleSides">
		<article class="middleText">
			<a href="customOrder.html" class="btn button">Build Your Own Pizza</a>
		</article>
		<article class="gallery">
			<h2 class="text-alignCenter">Order Online for Pickup or Delivery</h2>
		</article>
		<article class="middleText noMin">
			<a href="pizza-Cost.html" class="btn button">Pizza Cost Calculator</a>
		</article>
	</section>

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

  <!---    TABS BY CATEGORIES   ----------------------------->

    <div id="categories" class="tab-container">

		<ul class="tabs">
		   <?php
			 //echo "Show Category $show_categ";
			 /* insert li tabs dynamicaly */
			 $cat_sql = $dbh->prepare("SELECT * FROM sp19_categories");
			 $cat_sql->execute();
		   		$i = 1;
				while ($cat_row = $cat_sql->fetch()){
				   $cat_id = $cat_row['catid'];
				   $cat_name = $cat_row['catname'];

				   //echo "$cat_id - $cat_name <br>";
					if ((($i == 1) && ($show_categ == 'N')) || ($cat_name == $show_categ)) {
					    echo '<li class="current" data-tab="tab-'.$cat_id.'">'.$cat_name.'</li>';
					} else {
						 echo '<li data-tab="tab-'.$cat_id.'">'.$cat_name.'</li>';
					}
					$i++;
				}
			?>
		</ul>

	 <?php
			$cat_sql = $dbh->prepare("SELECT * FROM sp19_categories");
			$cat_sql->execute();
				$i = 1;
				while ($cat_row = $cat_sql->fetch()){
				   $cat_id = $cat_row['catid'];
				   $cat_name = $cat_row['catname'];

				   //echo "$cat_id - $cat_name <br>";

					if ((($i == 1) && ($show_categ == 'N')) || ($cat_name == $show_categ)) {
						echo '<div id="tab-'.$cat_id.'" class="tab-content current clearfloat">';
					} else {
						echo '<div id="tab-'.$cat_id.'" class="tab-content clearfloat">';
					}

					echo '<section class="gallery text-alignCenter">';

					$prod_sql = $dbh->prepare("SELECT * FROM sp19_products WHERE catid = $cat_id;");
					$prod_sql->execute();

						while ($row = $prod_sql->fetch()){
						   $prod_name = $row['prodname'];
						   $prod_desc = $row['proddesc'];
						   $prod_price = $row['prodprice'];
						   $prod_img = $row['image'];

						  //echo "$prod_name - $prod_desc - $prod_price - $prod_img <br>";

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

   	   				$i++;
					echo '</section>';
					echo '</div>';
				}
	?>


</div> <!-- end div tab-container -->



 <a href="<?php echo "$rootPath"; ?>customOrder.html" class="btn button">Build your own Custom Pizza</a>

 <a id="bttBtn" href="#order"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
<?php
	include('../includes/footer2.php');
?>
