/*eslint-env browser*/

var $ID = function (id) {
    "use strict";
    return window.document.getElementById(id);
};

var crustObj = {
	list: [
		{
		type: "Hand Tossed",
		opts: 	[
			['Small($9.99)',9.99],
			['Medium($12.99)',12.99],
			['Large($14.99)',14.99]
			]
		},
		{
		type: "Thin",
		opts: [
			['Medium($11.99)',11.99],
			['Large($13.99)',13.99]
			],
		},
		{
		type: "NYS",
		opts: [
			['Large($16.99)',16.99],
			['X-Large($19.99)',19.99]
			],
		},
		{
		type: "Gluten Free",
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

function estimateOrder(event) {
	"use strict";

    event.preventDefault(); //when you refresh, does not take you to the top of the page

    /*validate();*/

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
	$ID('cp-price').innerHTML = '$' + totalEstimate.toFixed(2);

    /*$ID('est-results1').innerHTML = 'You selected:<br> Pizza: ' +
        crust + ' crust, '
        + $ID("p-size").options[$ID("p-size").selectedIndex].text
        + ' size, ' + $ID("o-cheeze").options[$ID("o-cheeze").selectedIndex].text + ' cheeze, with ' + numToppings + ' toppings: ' + checkedToppings ;*/

	 $ID('est-results2').innerHTML = crust + ' crust, '
        + $ID("p-size").options[$ID("p-size").selectedIndex].text
        + ' size, ' + $ID("o-cheeze").options[$ID("o-cheeze").selectedIndex].text + ' cheeze with ' + numToppings + ' toppings: ' + checkedToppings ;

 } // end function estimateOrder


 /* EVENT LISTENERS */

 $ID("pizza-form").addEventListener("submit", estimateOrder, false);

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
