<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Speciasl");

include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';

if(isset($_POST['submit'])) {
  	$prodid = $_GET['prodid'];

	//$rest = var_dump($_POST);
	//echo $rest;

 	$qty = $_POST["qty$prodid"];

	addtocart($prodid,$qty);
};


?>

   <section class="menuWeekly">
    <h2 class="text-alignCenter">Weekly Specials</h2>

    <div class="tab-container">

		<ul class="tabs">
  			<?php
				$weekDayArray = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
			    date_default_timezone_set('US/Pacific');
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
						   $prod_id = $row['prodid'];
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
								echo '<p>'.$prod_desc.'</p>';
								/*<a href="#" class="btn button ">Add to Cart!</a>';*/

								echo '<form action = "'.$_SERVER['PHP_SELF'].'?prodid='.$prod_id.'" method="post">
								<ul class="formBtn">
									<li><label for="qty">Qty</label></li>
									<li><input type="number" name="qty'.$prod_id.'" id="qty'.$prod_id.'" size="5" value="1" required="required"/></li>
									<li><input type="submit" name="submit" class="button btn-orderForm" value="Add to Cart">
									</li>
								</ul>
								</form>
								';

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

<a href="custom-pizza.php" class="btn button">Build your own Custom Pizza</a>

<a id="bttBtn" href="#search"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>

<?php
	include('../includes/footer.php');
?>
