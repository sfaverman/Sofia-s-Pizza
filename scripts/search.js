/*
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions
*/

$('#search').keyup(function(){

/* keyup = when user typing and releasing key */
    var searchField = $('#search').val();
    var myExp = new RegExp(searchField, 'i');
    /* i stands for case insensitive */

    $.getJSON('menu.json', function(data){
        console.log(data);
        var output = '<ul class="searchResults">';

        $.each(data, function(key,val){

            /* .search is a method of a regular expression */
            if((val.product.search(myExp) != -1) || (val.category.search(myExp) != -1) || (val.description.search(myExp) != -1)) {

                output += '<li>';
                output += '<h2>'+val.product + '</h2>';
                output += '<img src ="search-image/'+val.image+'.jpg" alt="'+val.name+'" />';
                output += '<p>'+ val.price + '</p>';
                output += '<p><em>'+ val.description + '</em></p>';
                output += '</li>';
            }
        });

        output += '</ul>';
        $('#update').html(output);
    })

})
