<?php
    $rootPath = '/E-COMMERCE/Sofia_Pizza/';
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Sofia's Pizza" content="Sofia's Pizza restaurant website">
    <title>
    	<?php
            if (defined('TITLE')) {
                print TITLE;
            } else {
                print "Sofia's Pizza"; // default if no title exist
            }
        ?>
       </title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo "$rootPath"; ?>css/hsm_min.css" type="text/css">
    <!--custom css-->
    <link rel="stylesheet" href="<?php echo "$rootPath"; ?>css/pizza.css">
    <link rel="stylesheet" href="<?php echo "$rootPath"; ?>css/search.css">

    <!--Scripts-->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js" defer></script>
	 <script src="<?php echo "$rootPath"; ?>scripts/hsm.js" defer></script>
     <script src="<?php echo "$rootPath"; ?>scripts/search.js" defer></script>
     <script src="<?php echo "$rootPath"; ?>scripts/pizza-order.js" defer></script>
     <script src="<?php echo "$rootPath"; ?>scripts/backtotop.js" defer></script>

</head>
<body id="<?php if ($activePage == 'index') {echo 'home';} else {echo $activePage;} ?>">
         <header class="grid asideLeft">
               <div>
                    <img src="<?php echo "$rootPath"; ?>images/pizza-demo-logo.png" class="img-responsive mt" alt="company logo">  </div>
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
                    <a href="<?php echo "$rootPath"; ?>index.php" class="nav-title <?php if ($activePage == 'index') { echo ' active';} ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo "$rootPath"; ?>pages/specials.php" class="nav-title <?php if ($activePage == 'specials') { echo ' active';} ?>">Specials</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo "$rootPath"; ?>pages/menuPage.php" class="nav-title<?php if ($activePage == 'menuPage') { echo ' active';} ?>">Menu</a>
                </li>
               <li class="nav-item">
                    <a href="<?php echo "$rootPath"; ?>pages/order.php" class="nav-title <?php if ($activePage == 'order') { echo ' active';} ?>">Order</a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo "$rootPath"; ?>pages/contact.php" class="nav-title <?php if ($activePage == 'contact') { echo ' active';} ?>">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

<div class="bgImage">

<main class="galWrapper">
<div class="aboveMenu2">&nbsp; </div>
<header class="grid menu2">
          <article>
          <!-- <form class="search" action ="<?php echo "$rootPath"; ?>pages/location.php" method="get">-->
            <form  class="search" action ="#" method="get">
                    <select class="searchLoc" id="selLoc">
                        <option value="">Location</option>
                        <option value="92128">Rancho Bernardo</option>
                        <option value="92108">Mission Valley</option>
                        <option value="92037">La Jolla</option>
                        <option value="92014">Del Mar</option>
                        <option value="92107">Point Loma</option>
                     </select>
                     <button type="submit" id="butLoc" class="searchButton">
						<i class="fas fa-map-marker-alt"></i>
					 </button>

		    </form>
		  	<div id='resultLoc'></div>

	      </article>
          <article>
			    <form class="search" action ="<?php echo "$rootPath"; ?>pages/searchSql.php" method="get">
					  <input type="text" class="searchTerm" name="qry" placeholder="Search">
					  <button type="submit" class="searchButton">
						<i class="fas fa-search"></i>
					  </button>
			  </form>

	      </article>
		  <article>
			  <a href="<?php echo "$rootPath"; ?>pages/viewcart.php"><i class="fas fa-shopping-cart"></i><?php echo ' <span id="numcartitems"> '.numcartitems($sessid).' </span>'; ?>item(s)</a>
		  </article>
</header>
<article id="popUp">
  <ul>
	<li>
		<p id="popUp1"> New item product id=<span id="popUpItem1"></span>added to cart! </p>
		<p id="popUp2"> Quantities updated for product id=<span id="popUpItem2"></span>! </p>
		<p id="popUp3"> Deleted product id=<span id="popUpItem3"></span>! </p>
	</li>
	<li>
	     <?php if ($activePage == 'viewcart') {
	         	echo '<a href="viewcart.php#checkout" title="view cart button" class="button btnCall">Checkout!</a>';
         	} else {
				echo '<a href="viewcart.php" title="view cart button" class="button btnCall">View Cart</a>';
			}
		?>
	</li>
  </ul>
</article>
