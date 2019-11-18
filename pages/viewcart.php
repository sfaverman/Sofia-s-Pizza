<?
ob_start();
require '../includes/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<script type="text/javascript">
function sameship() {
	if (document.getElementById("ship").checked == true)
	   {
document._xclick.billfirst_name.value = document._xclick.first_name.value ;
document._xclick.billlast_name.value = document._xclick.last_name.value;
document._xclick.billaddress1.value = document._xclick.address1.value   ;
document._xclick.billcity.value = 	document._xclick.city.value ;
  document._xclick.billstate.value =   document._xclick.state.value;
  document._xclick.billzip.value =  document._xclick.zip.value;
	   }
else {
document._xclick.billfirst_name.value = '' ;
document._xclick.billlast_name.value = '';
document._xclick.billaddress1.value = ''   ;
document._xclick.billcity.value = 	'' ;
  document._xclick.billstate.value =  '';
  document._xclick.billzip.value =  '';
	}
}



</script>
</head>
<body>
<?
$removeid = $_GET['remove'];
if ($removeid)
   {
$dbh->exec("delete from $cartitems where id = '$removeid'");
   }
$qtytoupdate = $_POST['qty'];
if (isset($qtytoupdate))
    {
$prodid = $_POST['prodid'];
$dbh->exec("update	$cartitems set qty = '$qtytoupdate' where cartitems = '$prodid' and sessid = '$sessid'");
	}

$sql = "select $cartitems.id,$cartitems.cartitems,$products.name,$products.price ,$cartitems.qty,$products.id,$cartitems.attribute, $products.weight from $cartitems,$products where $cartitems.sessid = '$sessid' and $cartitems.cartitems = $products.id";
foreach ($dbh->query($sql) as $showrow)
   {
$cartitemnum= $showrow[0];
 $name = $showrow[2];
 $price = $showrow[3];
 $qty = $showrow[4];
 $prodid = $showrow[5];
 $attribute = $showrow[6];
?>
<img src = "<?= $root;?>thumbnail.php?pic=<?= $prodid.'/1.jpg&ht=100&wd=100';?>"/><br/>
<? echo $name.$attribute;?> <a href = "<?= $root;?>viewcart.php?remove=<?= $cartitemnum;?>">Remove</a> <br/>
<br>
Enter Coupon or Gift Certificate Code
<input type = "text" id = "coupon" />
<br/>
<br>
<p id = "couponresponse"></p>
<form action = "<?= $root;?>viewcart.php" method = "post">
  Quantity:
  <input type = "text" name = "qty" size = "2"
 value="<?=$qty;?>">
  <br/>
  <input type = "hidden" name = "prodid" value = "<?=$prodid;?>" />
  <br/>
  <input type="submit" name = "submit" value = "update" />
  <br/>
</form>
<?
   }
?>
    <div id="example1">
<form action= "https://www.sandbox.paypal.com/us/cgi-bin/webscr"
method="post"  name="_xclick">
  Shipping:<br/>
  First Name
  <input type = "text" name = "first_name" />
  <br/>
  Last Name
  <input type = "text" name = "last_name" />
  <br/>
  Address
  <textarea name = "address1" cols="10" rows="5"></textarea>
  <br/>
  City
  <input type = "text" name = "city"  id = "city"/>
  <br/>
  State
  <input type = "text" name = "state"  id = "state" />
  <br/>
  Zip:
  <input type = "text" name = "zip" id = "zip"/>
  <br/>
  Same as Shipping?
  <input type = "checkbox" id = "ship" onClick="sameship();"/>
  <br/>
  Billing:<br/>
  First Name
  <input type = "text" name = "billfirst_name" />
  <br/>
  Last Name
  <input type = "text" name = "billlast_name" />
  <br/>
  Address
  <textarea name = "billaddress1"></textarea>
  <br/>
  <span id = "citystate" style="display:none"> City
  <input type = "text" name = "billcity"/>
  <br/>
  State
  <input type = "text" name = "billstate"/>
  <br/>
  </span> Zip:
  <input type = "text" name = "billzip" onblur="makeRequest('state');"/>
  <br/>
  Email:
  <input type = "text" name = "email" />
  <br/>
  Phone:
  <input type = "text" name = "night_phone_a" />
  <br/>
  <!--Service: <select name = "service" onChange="makeRequest('ship')">
<option value = ''>Choose Service Below</option>
 <option value = "PRIORITYOVERNIGHT" <? if ($service == 'PRIORITYOVERNIGHT') echo "SELECTED";?>>FedEx Priority Overnight</option>
  <option value = "STANDARDOVERNIGHT" <? if ($service == 'STANDARDOVERNIGHT') echo "SELECTED";?>>FedEx Standard Overnight</option>
  <option value = "FIRSTOVERNIGHT" <? if ($service == 'FIRSTOVERNIGHT') echo "SELECTED";?>>FedEx First Overnight</option>
  <option value = "FEDEX2DAY" <? if ($service == 'FEDEX2DAY') echo "SELECTED";?>>FedEx 2 Day</option>
  <option value = "FEDEXEXPRESSSAVER" <? if ($service == 'FEDEXEXPRESSSAVER') echo "SELECTED";?>>FedEx Express Saver</option>
  <option value = "INTERNATIONALPRIORITY" <? if ($service == 'INTERNATIONALPRIORITY') echo "SELECTED";?>>FedEx International Priority</option>
  <option value = "INTERNATIONALECONOMY" <? if ($service == 'INTERNATIONALECONOMY') echo "SELECTED";?>>FedEx International Economy</option>
    <option value = "INTERNATIONALFIRST" <? if ($service == 'INTERNATIONALFIRST') echo "SELECTED";?>>FedEx International First</option>
    <option value = "FEDEX1DAYFREIGHT" <? if ($service == 'FEDEX1DAYFREIGHT') echo "SELECTED";?>>FedEx International Freight</option>
    <option value = "FEDEX2DAYFREIGHT" <? if ($service == 'FEDEX2DAYFREIGHT') echo "SELECTED";?>>FedEx 2 day Freight</option>
    <option value = "FEDEX3DAYFREIGHT" <? if ($service == 'FEDEX3DAYFREIGHT') echo "SELECTED";?>>FedEx 3 day Freight</option>
    <option value = "FEDEXGROUND" <? if ($service == 'FEDEXGROUND') echo "SELECTED";?>>FedEx Ground</option>
    <option value = "GROUNDHOMEDELIVERY" <? if ($service == 'GROUNDHOMEDELIVERY') echo "SELECTED";?>>FedEx Home Delivery</option>
</select><br/>-->
347933438
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="ksecor_1326497985_biz@adelphia.net">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="currency_code" value="USD">
  <?
$i = 1;
$newsql = "select $cartitems.cartitems,$products.name,$products.price ,$cartitems.qty,$products.id,$cartitems.attribute from $cartitems,$products where $cartitems.sessid = '$sessid' and $cartitems.cartitems = $products.id";
foreach ($dbh->query($newsql) as $row)
  {
 $name = $row[1];
 $price = $row[2];
 $qty = $row[3];
 $prodid = $row[4];
 $attribute = $row[5];
 $weight = $showrow[7];
?>
  <input type="hidden" name="item_name_<?= $i;?>" value = "<?= $name;?>" />
  <input type="hidden" name="item_number_<?= $i;?>" value = "<?=$prodid;?>" />
  <?
$each = explode(',',$attribute);
$y = 0;
for ($x=0;$x<count($each)-1 ;$x++)
     {
//Size:small
 $att = $each[$x];
 $catarr = explode(':',$att);
 $onname = $catarr[0];
 $choice = $catarr[1];
 ?>
<input type="hidden" name="on<?=$y;?>_<?=$i;?>" value = "<?= $onname;?>" />
<input type="hidden" name="os<?=$y;?>_<?=$i;?>" value = "<?= $choice;?>" />

<?
$y++;
	 }
  	 ?>
  <input type="hidden" name="amount_<?= $i;?>" value="<?= $price;?>">
  <input type="hidden" name="quantity_<?= $i;?>" value="<?= $qty;?>">
  <?
$i++;
$total = $price * $qty;
$total = money_format("%i",$total);
$cartcontent .= "$name $qty $attribute at $price Total: $total<br/>";
$subtotal += $total;
}
echo '<input type = "hidden" name = "shipping_1" value = "25.00"/>';
$subtotal = money_format("%i",$subtotal);
echo $cartcontent;
echo '<input type ="hidden" id ="subtotal" name = "subtotal" value = "'.$subtotal.'">';
echo '<br/>Subtotal:$<p id = "discount">'.$subtotal.'</p>';
$dbh=null;

/*
$GBP = "http://finance.yahoo.com/d/quotes.csv?s=USDGBP=X&f=sl1d1t1c1ohgv&e=.csv";
$EUR = "http://finance.yahoo.com/d/quotes.csv?s=USDEUR=X&f=sl1d1t1c1ohgv&e=.csv";
setcookie("EUR",$EUR);
setcookie("EUR",$GBP);
*/
?>
    <div class="text-error"></div>
  <div id = "copy">Shipping is</div>
  <input type="submit" name = "submit" value = "Check Out">
</form>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

The integrity and crossorigin attrib
    <script>
    $(function() {
		// IMPORTANT: Fill in your client key
		var clientKey = "PiB7Zl5AeO5uR41wKKU43cZdhVCAiJWVnaAM0DbbVhmNnGbYsD2VG41dRO9crbkt";

		var cache = {};
		var container = $("#example1");
		var errorDiv = container.find("div.text-error");

		/** Handle successful response */
		function handleResp(data)
		{
			// Check for error
			if (data.error_msg)
				errorDiv.text(data.error_msg);
			else if ("city" in data)
			{
				// Set city and state
                //make the field display inline

				container.find("input[name='city']").val(data.city);
				container.find("input[name='state']").val(data.state);
			}
		}

		// Set up event handlers
		container.find("input[name='zip']").on("keyup change", function() {
			// Get zip code
			var zipcode = $(this).val().substring(0, 5);
			if (zipcode.length == 5 && /^[0-9]+$/.test(zipcode))
			{
				// Clear error
				errorDiv.empty();

				// Check cache
				if (zipcode in cache)
				{
					handleResp(cache[zipcode]);
				}
				else
				{
					// Build url
					var url = "https://www.zipcodeapi.com/rest/"+clientKey+"/info.json/" + zipcode + "/radians";

					// Make AJAX request
					$.ajax({
						"url": url,
						"dataType": "json"
					}).done(function(data) {
						handleResp(data);

						// Store in cache
						cache[zipcode] = data;
					}).fail(function(data) {
						if (data.responseText && (json = $.parseJSON(data.responseText)))
						{
							// Store in cache
							cache[zipcode] = json;

							// Check for error
							if (json.error_msg)
								errorDiv.text(json.error_msg);
						}
						else
							errorDiv.text('Request failed.');
					});
				}
			}
		}).trigger("change");
	});

    </script>
</body>
</html>
