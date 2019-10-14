/*eslint-env browser*/

var $ID = function (id) {
    "use strict";
    return window.document.getElementById(id);
};

var crustObj = {
	list: [
		{
		type: "hand",
		opts: 	[
			['Small($9.99)',9.99],
			['Medium($12.99)',12.99],
			['Large($14.99)',14.99]
			]
		},
		{
		type: "thin",
		opts: [
			['Medium($11.99)',11.99],
			['Large($13.99)',13.99]
			],
		},
		{
		type: "nys",
		opts: [
			['Large($16.99)',16.99],
			['X-Large($19.99)',19.99]
			],
		},
		{
		type: "gluten",
		opts: [
			['Small($10.99)',10.99]
			]
		}
	]
}

window.addEventListener("load", function () {
    "use strict";
	var pizzaSize, cheese, sauce, numToppings, total;

/* FUNCTIONS */
/* validate input values */
function validate(){

/* validate name */
var name = $ID('name').value;
var nameRGEX = /^([a-zA-Z ]){2,30}$/;
var nameResult = nameRGEX.test(name);

if (nameResult == false) {
        window.console.log('invalid name');
        $ID('nameVal').innerHTML = 'Please enter a valid name';
        $ID('name').focus();
        return false;
} else {
        $ID('nameVal').innerHTML = "";
       /* return true;*/
}

/* validate street */

var street = $ID('street').value;
var streetRGEX = /^\d+[ ](?:[A-Za-z0-9.-]+[ ]?)+(?:Avenue|Lane|Road|Boulevard|Drive|Street|Ave|Dr|Rd|Blvd|Ln|St|Way)\.?/ ;
var streetResult = streetRGEX.test(street);

if (streetResult == false) {
        window.console.log('invalid street name');
        $ID('streetVal').innerHTML = 'Please enter a valid street name';
        $ID('street').focus();
        return false;
} else {
        $ID('streetVal').innerHTML = "";
       /* return true;*/
}

/* validate city */

var city = $ID('city').value;
var cityRGEX = /^[a-zA-Z',.\s-]{1,25}$/;
var cityResult = cityRGEX.test(city);

if (cityResult == false) {
        window.console.log('invalid city name');
        $ID('cityVal').innerHTML = 'Please enter a valid city name';
        $ID('city').focus();
        return false;
} else {
        $ID('cityVal').innerHTML = "";
        return true;
};


/* validate zipCode */
var zipcode = $ID('zip').value;
var zipcodeRGEX = /^[0-9]{5}(?:-[0-9]{4})?$/;
var zipcodeResult = zipcodeRGEX.test(zipcode);

if (zipcodeResult == false) {
        window.console.log('invalid zipcode');
        $ID('zipVal').innerHTML = 'Please enter a valid zipcode';
        $ID('zip').focus();
        return false;
} else {
        $ID('zipVal').innerHTML = "";
       /* return true;*/
}

/* validate phone; */
var phone = $ID('phone').value;
var phoneRGEX = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
var phoneResult = phoneRGEX.test(phone);

if (phoneResult == false) {
        window.console.log('invalid phone');
        $ID('phoneVal').innerHTML = 'Please enter a valid phone';
        $ID('phone').focus();
        return false;
} else {
        $ID('phoneVal').innerHTML = "";
        /*return true;*/
}
    $ID('txt-estimate').focus();
    return true;

}  // End validate()

/* show 'Other Address Type' input field only if 'Other' selected on a drop-down menu */
function checkAddrTypeValue() {
        var val = $ID("a-type").value;
        if(val==="O") {
           $ID('otherOpt').style.display='block';
        }
        else {
           $ID('otherOpt').style.display='none';
        }
}



function estimateOrder(event) {                                      "use strict";

    event.preventDefault(); //when you refresh, does not take you to the top of the page

    validate();

    /* Delivery information */
    window.console.log('Dear '+ $ID("name").value +',');
    window.console.log("You Selected:\n");
    window.console.log("Pizza will be delivered to you at");
    window.console.log($ID("street").value + ', ' + $ID("city").value + ', ' + $ID("s-state").value + ' ' + $ID("zip").value);
    var totalEstimate;
    /* radio buttons */
    var crust,
        crustList = $ID('pizza-form').r_dough;
        var isCrustChecked = false;
        for (var i = 0; i < crustList.length; i++) {
            if(crustList[i].checked == true) {
                crust = crustList[i].value;
                isCrustChecked = true;
                break;
            }
        };
        if (!isCrustChecked) {
             $ID('crustVal').innerHTML = 'Please select crust type';
             $ID('r-dough-hand').focus();
        } else {
			 $ID('crustVal').innerHTML = "";
		};



    /* checkboxes 0 toping */
    var checkedToppings = "", numToppings = 0;
    var toppings = $ID('pizza-form').toppings;
    for(var i = 0; i < toppings.length; i++){
      if(toppings[i].checked){
           checkedToppings += toppings[i].value + ",";
           numToppings++;
           window.console.log(checkedToppings);
          /* break;*/
      }
    }

   /*  window.console.log("You Selected:\n");
     window.console.log("Pizza crust: " + crust);
     window.console.log("Pizza size: " + $ID("p-size").text);
     window.console.log("Cheeze option: " + $ID("o-cheeze").text);
     window.console.log("Toppings: " + checkedToppings);
     window.console.log("Number of Toppings:" + numToppings);
  */
    totalEstimate = Number($ID("p-size").value) + Number($ID("o-cheeze").value) + Number($ID("o-sauce").value) + (numToppings * 0.99);

    $ID('txt-estimate').value = '$' + totalEstimate.toFixed(2);

   	 $ID('est-result').innerHTML = 'You selected:<br> Pizza: ' +
        crust + ' crust, '
        + $ID("p-size").options[$ID("p-size").selectedIndex].text
        + ' size, ' + $ID("o-cheeze").options[$ID("o-cheeze").selectedIndex].text + ' cheeze, with ' + numToppings + ' toppings: ' + checkedToppings ;



 } // end function estimateOrder

 function submitOrder(event) {
	 "use strict";

    event.preventDefault(); //when you refresh, does not take you to the top of the page


   /* window.console.log('Dear '+ $ID("name").value +',');
	window.console.log('Thank you for your ORDER!\n')
    window.console.log("It will be delivered to you at");
    window.console.log($ID("street").value + ', ' + $ID("city").value + ', ' + $ID("s-state").value + ' ' + $ID("zip").value);*/


	 $ID('order-result').innerHTML = 'Thank you for your ORDER!<br> It will be delivered to you at <br>' +
		$ID("street").value + ', ' + $ID("city").value + ', ' + $ID("s-state").value + ' ' + $ID("zip").value;
 }
 /* EVENT LISTENERS */

 $ID("a-type").addEventListener("change", checkAddrTypeValue, false);
 $ID("pizza-form").addEventListener("submit", estimateOrder, false);
 $ID("billing-form").addEventListener("submit", submitOrder, false);

/* add event listener to choose your crust radio buttons */
  var radioOption = [
      document.getElementsByName('r_dough')[0],
      document.getElementsByName('r_dough')[1],
      document.getElementsByName('r_dough')[2],
      document.getElementsByName('r_dough')[3]
  ];
   //Use forEach
   radioOption.forEach(function(e) {
       e.addEventListener("click", function() {
          /*alert(e.value);*/
          /*window.console.log('You selected ' + e.value + ' crust'); */
		   $ID("p-size").options.length = 1;
		  var index;
		  for(index in crustObj.list) {
			  // window.console.log(crustObj.list[index].type);
			  if (e.value === crustObj.list[index].type)
				for (var i = 0; i < crustObj.list[index].opts.length; i++) {
			  	$ID("p-size").options[$ID("p-size").options.length] = new Option(crustObj.list[index].opts[i][0],crustObj.list[index].opts[i][1]);
			  }
		  }

       });
    });

 /* END EVENT LISTENERS */

}); // end "load" event listener


