<?php
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';
$prodid = $_POST['prodid'];
$qty = $_POST['qty'];

if (isset($qty)){
    addtocart($prodid,$qty);
}


?>
 <div class="img-nav">
<?php
$sql = $dbh->prepare("select * from sp19_categories");
$sql->execute();
$i = 1;
while ($row = $sql->fetch()){

  $catid = $row['catid'];
  $pic = 'catimages/'.$catid.'.jpg';
  $catname = $row['catname'];
  $link = 'categories.php?catid='.$catid;
  echo '<div>
            <a target="_parent" href="'.$link.'">
                <img src="'.$pic.'" alt="'.$catname.'">
            </a>
            <div class="desc"><a href="'.$link.'">'.strtoupper($catname).'</a></div>
        </div>';
    }
    ?>
    </div>

    <section>

    	<h1>FEATURED PRODUCTS</h1>

    <div class="products">
        <?php

    $sql = $dbh->prepare("select * from sp19_products where featured = 'yes'");
    $sql->execute();
    $i=1;
	/*$img_cat = ['','pi','san','sal','des','dr','par'];	*/
    while ($row = $sql->fetch()){
        $prodid = $row['prodid'];
        $prodname = $row['prodname'];
        $proddesc = $row['proddesc'];
        $prodprice = $row['prodprice'];
		$prodimg = $row['image'];
		/*$catid = $row['catid'];*/
        $picname = '../images/products/'.$prodimg.'.jpg';
		//echo  $picname;

   echo   '<div class="prod'.$i.'">
            <a href="products.php?prodid='.$prodid.'"><img src="'.$picname.'" alt="'.$prodname.'"></a>
            <div class="prod-desc">
               <div>
               <form action = "index.php" method="post">
              <input type="hidden" name="qty" value="1" required="required"/>

              <input type="hidden" name="prodid" value="'.$prodid.'" required="required"/>
                <input type="submit" class="fas fa-shopping-cart" value="Add to Cart">
              </form>

                <a href=""><i class="fas fa-shopping-cart"></i>Add to Cart</a>
               </div>
               <div>
                 <p><strong>&#36;19&#46;53 </strong><span>&#36;27&#46;90</span> 30&#37; OFF</p>
                 <p>'.$prodname.'</p>
                 <p class="review"><a href="">31 Reviews</a></p>s
               </div>
            </div>
          </div>';

$i++;
}
    ?>
    	<!--

    	<div class="prod2">
    		<a href=""><img src="images/round-punch%20shield.JPG" alt="round punch shield"></a>
    		<div class="prod-desc">
    		   <div>
    			<a href=""><i class="fas fa-shopping-cart"></i>Add to Cart</a>
    		   </div>
    		   <div>
    		   	 <p><strong>&#36;49&#46;99</strong></p>
    		   	 <p>Round Punch Shield V2</p>
    		   	 <p class="review"><a href="">9 Reviews</a></p>
    		   </div>
    		</div>
    	</div>

    	<div class="prod3">
    		<a href=""><img src="images/gloves1.JPG" alt="boxing gloves"></a>
    		<div class="prod-desc">
    		   <div>
    			<a href=""><i class="fas fa-shopping-cart"></i>Add to Cart</a>
    		   </div>
    		   <div>
    		   	 <p><strong>&#36;24&#46;99</strong> </p>
    		   	 <p>Boxing Gloves</p>
    		   	 <p class="review"><a href="">26 Reviews</a></p>
    		   </div>
    		</div>
    	</div>

    	<div class="prod4">
    		<a href=""><img src="images/punchbag.JPG" alt="punching bag"></a>
    		<div class="prod-desc">
    		   <div>
    			<a href=""><i class="fas fa-shopping-cart"></i>Add to Cart</a>
    		   </div>
    		   <div>
    		   	 <p><strong>&#36;199&#46;99</strong> </p>
    		   	 <p>World Heavy Bags 2.0</p>
    		   	 <p class="review"><a href="">17 Reviews</a></p>
    		   </div>
    		</div>
    	</div>

    	<div class="prod5">
    		<a href=""><img src="images/reflex%20bal.JPG" alt="reflex-ball"></a>
    		<div class="prod-desc">
    		   <div>
    			<a href=""><i class="fas fa-shopping-cart"></i>Add to Cart</a>
    		   </div>
    		   <div>
    		   	 <p><strong>&#36;32&#46;00</strong> <span>&#36;40&#46;00</span> 20&#37; OFF</p>
    		   	 <p>Reflex Ball</p>
    		   	 <p class="review"><a href="">16 Reviews</a></p>
    		   </div>
    		</div>
    	</div>

    	<div class="prod6">
    		<a href=""><img src="images/headgear2.JPG" alt="headgear"></a>
    		<div class="prod-desc">
    		   <div>
    			<a href=""><i class="fas fa-shopping-cart"></i>Add to Cart</a>
    		   </div>
    		   <div>
    		   	 <p><strong>&#36;45&#46;00 </strong><span>&#36;50&#46;00</span> 30&#37; OFF</p>
    		   	 <p>Boxing T&#45;shirt</p>
    		   	 <p class="review"><a href="">31 Reviews</a></p>
    		   </div>
    		</div>
    	</div>
    -->

    </div> <!--    End of products class-->

    </section>
    	<div class="social">
    		<div class="soc a">
    			<div  class="soc-desc"><a href="">FEATURED VIDEO</a></div>
    		</div>

    		<div class="soc b">
    			<div  class="soc-desc"><a href="">SOCIAL CLUB</a></div>
    		</div>

    		<div class="soc c">

    			<div class="soc-desc"><a href="">EVENTS</a></div>
    		</div>

    	</div>
    	<?php
        include '../includes/footer.php';
        ?>
