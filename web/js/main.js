$(document).ready(function () {

    var ola = $('raschetmetodikaresult').text();

    // $(ola).find('usli').each(function() {
    //     var $usel = $(this);
    //     var name = $usel.find('name_usli').text();
    // });


    $(ola).find("usli").each(function () {
        var name = $(this).attr("name_usli");
        var value = $(this).attr("value");
        $('.itog').append("<h4>"+ name +" - <a href='#' class='link'>"+ value +"</a></h4>");
    });

    $('.result_str').hide();

    var explode = function(){
        // $('a').attr("data","style").first().val();
        $('a:first-child').text();
        console.log(this);
    };
    setTimeout(explode, 1500);


    // $('h3').text(name + '<br>');

});

