/*
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
*/

//alert ("You are on a search page");

$('#search').keyup(function(){

/* keyup = when user typing and releasing key */
    var searchField = $('#search').val();
    var myExp = new RegExp(searchField, 'i');
    /* i stands for case insensitive */

    $.getJSON('../sofia-pizza.json', function(data){
        //console.log(data);
        var output = '<ul class="searchResults">';

        $.each(data, function(key,val){

            /* .search is a method of a regular expression */
            if((val.prodname.search(myExp) != -1) || (val.proddesc.search(myExp) != -1)) {

                output += '<li>';
                output += '<h2>'+val.prodname + '</h2>';
                output += '<img src ="../images/products/'+val.image+'.jpg" alt="'+val.prodname+'" />';
                output += '<p>$'+ val.prodprice + '</p>';
                output += '<p><em>'+ val.proddesc + '</em></p>';
				output += '<a href="#" class="btn button ">Add to Cart !</a>';
                output += '</li>';
            }
        });

        output += '</ul>';
        $('#update').html(output);
    })

})
