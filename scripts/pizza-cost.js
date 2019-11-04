function calculateCost() {
event.preventDefault();
var pizzaCost = document.pizzaForm.pizzaCost.value;

var pizzaDiameter = document.pizzaForm.pizzaDiameter.value;

var pizzaRadius = pizzaDiameter / 2;

var pizzaArea = ((Math.pow(pizzaRadius, 2)) * Math.PI).toFixed(2);

var pricePerSquareInch = (pizzaCost / pizzaArea).toFixed(2);

console.log(pizzaCost);
console.log(pizzaDiameter);
console.log(pizzaRadius);
console.log(pizzaArea);
console.log(pricePerSquareInch);

costResult.innerHTML = "The cost per square inch of this pizza with a price of " + pizzaCost + " dollars" + ", a radius of " + pizzaRadius + " inches," + " and an area of " + pizzaArea + " square inches"  + " is: " + pricePerSquareInch + " dollars per in².";

};


