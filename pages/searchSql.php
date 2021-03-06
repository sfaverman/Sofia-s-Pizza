<?php
 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Search");
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';
?>

<!--<form action ="search.php" method="get">
<input type="text" name="qry">
<button>Search</button>
</form>	-->
<?php
/*require '../includes/connect.php';*/

if ($_GET['qry']  == ''){
	$qry = ' ';
}
else {
  $qry = $_GET['qry'];
}

	//how to write difficult queries

   //get the number of results....
if (!empty($qry) && $qry != ' '){
?>
<script>
    var current = localStorage.getItem('recent');
    localStorage.setItem('recent',current + ',<?php echo $qry;?>');
  </script>
<?php
}
	$num = $dbh->prepare("select  count(sp19_products.prodid) as numres
       from sp19_categories, sp19_products
       where (sp19_categories.catname like '%$qry%' or
       sp19_products.prodname like '%$qry%' or sp19_products.proddesc like '%$qry%') and sp19_categories.catid = sp19_products.catid");


	$num->execute();
	$row = $num->fetch();
		echo "<i> Your search for '".$qry."' generated ".$row['numres']." results</i>";



	//get what you want how you want....
   $sql = $dbh->prepare("select sp19_categories.catid, sp19_categories.catname, sp19_products.prodid, sp19_products.prodname, sp19_products.proddesc,sp19_products.prodprice,sp19_products.image
       from sp19_categories, sp19_products
       where (sp19_categories.catname like '%$qry%' or
       sp19_products.prodname like '%$qry%' or sp19_products.proddesc like '%$qry%') and sp19_categories.catid = sp19_products.catid");



   $sql->execute();

   echo '<section class="gallery text-alignCenter">';
   while ($row = $sql->fetch()){
   	$catid = $row['catid'];
   	$catname = $row['catname'];
   	$prodid = $row['prodid'];
   	$prodname = $row['prodname'];
   	$proddesc = $row['proddesc'];
   	$prodprice = $row['prodprice'];
	$prodimg = $row['image'];
	$picname = '../images/products/'.$prodimg.'.jpg';
	echo '<div class="card-container">';
		echo '<img src = "'.$picname.'" alt="'.$prodname.'" class="img-responsive zoomIn" >
		<div>
			<h4>'.$prodname.'</h4>
			<p class="price">$'.$prodprice.'</p>
			<a class="btn button" href="products.php?prodid='.$prodid.'" title="click to see more">View and Order</a>
		</div>';
   	echo '</div>';
   }
    echo '</section>';

/*echo '<a id="bttBtn" href="#searchSql"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';*/
include '../includes/footer.php';

?>
