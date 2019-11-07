/*eslint-env browser*/

/* learned from W3c website */

// When the user scrolls down 100px from the top of the document, show the button


window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
	 document.getElementById("bttBtn").style.display = "block";
  } else {
	 document.getElementById("bttBtn").style.display = "none";
  }
}
