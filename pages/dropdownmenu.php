<?php
//based on prodid 1
include '../includes/connect.php';
$sql = $dbh->prepare("select distinct sp19_labels.labelid,sp19_labels.labelname
	from sp19_labels, sp19_attributes
	where sp19_labels.labelid = sp19_attributes.labelid
	and sp19_attributes.prodid = '1'");
$sql->execute();
while ($row = $sql->fetch()){
	$labelid = $row[0];
	$labelname = $row[1];
	echo $labelname.': <select name="'.$labelname.'" value="'.$labelname.'">'."\n";
	$innersql = $dbh->prepare("select value,price from sp19_attributes where prodid = '1' and labelid = '$labelid'");
	$innersql->execute();
	while ($innerrow = $innersql ->fetch()){
		$value = $innerrow[0];
		$price = $innerrow[1];
		echo '<option value = "'.$value.'">'.$value.' - $'.$price.'</option>'."\n";

	}
	echo '</select><br>';
}


?>
