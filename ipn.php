<?php
foreach ($_POST as $key=>$val){
    $content .= $key.' '.$val.'<br>';
}
mail("sofiasd@yahoo.com","You have an order!",$content,"Content-type:text/html");
?>
