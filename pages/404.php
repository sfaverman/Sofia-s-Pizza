<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Page not found");

include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';

?>

   <section class="nf404">

    <h2 class="text-alignCenter">Oops .. Page Not Found</h2>
	<h2 class="text-alignCenter"><img src="../images/404_mask.png" alt="404 error page not found icon"></h2>

	<br>
	<h3 class="text-alignCenter"> Uh-oh... something is wrong here.</h3>

	<h4 class="text-alignCenter">The page you are looking for might have been removed, had its name chaged, or is temporary unavailable.</h4>

	<article class="middleText">
            <a href="../index.php" class="btn button"> Go Back to Home page!</a>
   </article>

</section>

<!--
<a id="bttBtn" href="#search"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
-->

<?php
	include('../includes/footer.php');
?>
