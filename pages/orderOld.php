<?php
session_start();
//var_dump($_SESSION);

//Connect to database

$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
//echo 'connected to sofia_pizza database<br>';

/* if link from home page section 1 */
if(isset($_GET['category'])) {
		$show_categ = $_GET['category'];
		//echo "Show Category $show_categ";
} else {
		$show_categ = 'N';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="CSS Framework" content="Easy framework to build responsive website">
    <title>Sofia's Pizza - Order Page</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/hsm_min.css" type="text/css">
    <!--custom css-->
    <link rel="stylesheet" href="../css/pizza.css">
    <link rel="stylesheet" href="../css/search.css">

</head>
<body id="order">
         <header class="grid asideLeft">
               <div>
                    <img src="../images/pizza-demo-logo.png" class="img-responsive mt" alt="company logo">  </div>
               <div class="middleText">
                   <h1>Sofia's Pizza</h1>
               </div>
           </header>

       <nav class="navbar-container transparentNav opacityNone">
        <!--<div class="logo">
           <a href="#" class="navbar-brand">Sofia's Pizza</a>
       </div>-->
       <button id="navbar-toggler">
             <span class="menu-bar"><i class="fas fa-bars"></i></span>
       </button>
       <div id="menu">
            <ul class="main-nav">
                <li class="nav-item">
                    <a href="../index.html" class="nav-title">Home</a>
                </li>
                <li class="nav-item">
                    <a href="specials.php" class="nav-title">Specials</a>
                </li>
                <li class="nav-item">
                    <a href="menu.php" class="nav-title">Menu</a>
                </li>
               <li class="nav-item">
                    <a href="order.php" class="nav-title active">Order</a>
                </li>

                <li class="nav-item">
                    <a href="contact.html" class="nav-title">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

<section class="bgImage">
     <p>&nbsp;</p>

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



 <a href="customOrder.html" class="btn button">Build your own Custom Pizza</a>

 <a id="bttBtn" href="#order"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>

<footer class="footer styleAccord">
   <section class="grid column3">
   	<article>
		<p>VISIT US</p>
  		<form action="" id="location">
             <label for="location">Find a Restaurant:</label>
                    <select name="location" id="location">
                        <option value="">- Please select -</option>
                        <option value="RB">Rancho Bernardo</option>
                        <option value="MV">Mission Valley</option>
                        <option value="LJ">La Jolla</option>
                        <option value="DM">Del Mar</option>
                        <option value="Point Loma">Point Loma</option>
                     </select>
		</form>
  		<p>We offer so much to love!</p>
  		<!--<a href="order.html" class="btn button ">Order Online</a>-->

   	</article>
   	<article>
   		<ul>
   			<li><a href="#" class="btn button">Download our app</a></li>
   			<li><a href="#" class="btn button">Buy a gift card</a></li>
   			<li><a href="#" class="btn button">Order Online</a></li>
   		</ul>
   		<ul class="displayInline">
   				<li><a href="#">Careers</a></li>
   				<li><a href="#">Deals</a></li>
   				<li><a href="#">Menu</a></li>
   				<li><a href="#">About</a></li>
   				<li><a href="#">Franchise</a></li>
   				<li><a href="#">Contact</a></li>
   		</ul>

   		<p>&copy; 2019 Sofia's Pizza</p>

   	</article>

   	<article>
   		<p>Follow Us on Social Media</p>
   		<div class="social mb">
   			<a href="#"><i class="fab fa-facebook"></i></a>
   			<a href="#"><i class="fab fa-instagram"></i></a>
		   	<a href="#"><i class="fab fa-twitter"></i></a>
		    <a href="#"><i class="fab fa-yelp"></i></a>
		   	<a href="#"><i class="fab fa-google-plus"></i></a>
   		</div>
   		<p>Call Now to order</p>
   		<p>888-999-9999</p>
   	</article>

   </section>

</footer>
</main>
</section>

<!--Scripts-->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	 <script src="../scripts/hsm.js"></script>
     <script src="../scripts/search.js"></script>
     <script src="../scripts/backtotop.js"></script>


</body>
</html>
