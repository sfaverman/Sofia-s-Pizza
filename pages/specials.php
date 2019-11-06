<?php
session_start();
//var_dump($_SESSION);

//Connect to database

$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
//echo 'connected to sofia_pizza database<br>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="CSS Framework" content="Easy framework to build responsive website">
    <title>Sofia's Pizza - Order Page</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/hsm.css" type="text/css">
    <!--custom css-->
    <link rel="stylesheet" href="../css/pizza.css">
   <!-- <link rel="stylesheet" href="../css/search.css">-->

</head>
<body id="home">
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
                    <a href="specials.php" class="nav-title active">Specials</a>
                </li>
                <li class="nav-item">
                    <a href="menu.html" class="nav-title">Menu</a>
                </li>
               <li class="nav-item">
                    <a href="order.php" class="nav-title">Order</a>
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

   <section class="menuWeekly">
    <h2 class="text-alignCenter">Weekly Specials</h2>

    <div class="tab-container">

		<ul class="tabs">
  			<?php
				$weekDayArray = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
				$today = date("Y-m-d");
				$weekDayNum = date('N', strtotime($today));
				//echo "Today: " . $today . " weekday: " . $weekDayNum . "<br>";
				$weekDay = date('l', strtotime($today));
				echo "Today: " . $today . ' - ' .$weekDay . "<br>";
				for ($i = 0; $i < count($weekDayArray); $i++) {
				   if ($i == $weekDayNum - 1) {
					 echo '<li class="current" data-tab="tab-'.$i.'">'.$weekDayArray[$i].'</li>';
				   } else {
					 echo '<li data-tab="tab-'.$i.'">'.$weekDayArray[$i].'</li>';
				   }
				}
			?>
		</ul>

	 <?php
		    $weekDayArray = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];

				$i = 0;
				while ($i < count($weekDayArray)) {
				   	if ($i == 0) {
						echo '<div id="tab-'.$i.'" class="tab-content current clearfloat">';
					} else {
						echo '<div id="tab-'.$i.'" class="tab-content clearfloat">';
					}
					echo '<section class="gallery text-alignCenter">';

					//echo "$weekDayArray[$i]";

					$prod_sql = $dbh->prepare("SELECT * FROM sp19_products WHERE weeklyspecial = '$weekDayArray[$i]';");
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
							    $disPrice = $prod_price / 100 * 80;
							    $disPrice = round($disPrice,2);
								echo '<p> reg $'.$prod_price.', '.$weekDayArray[$i].'<span class="price">$'.$disPrice.'</span></p>';
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

</section>   <!-- end weekly specials section -->

 <a href="customOrder.html" class="btn button">Build your own Custom Pizza</a>



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
   <!--  <script src="../scripts/search.js"></script>-->

</body>
</html>
