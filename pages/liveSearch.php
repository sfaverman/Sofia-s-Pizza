
 <?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Live Search");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../includes/header.php';
?>


<div id="containerSearch">

		<section id="searchArea">
		        <label for="search">Live Search</label>
		        <p>Enter the name or info about a product</p>
		        <input type="search" name="search" id="search" placeholder="name or info">
		    </section>
		    <section>
		        <article id="update"></article>
		    </section>
</div>

<!--<a id="bttBtn" href="#liveSearch"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';-->

<?php
	include('../includes/footer.php');
?>
