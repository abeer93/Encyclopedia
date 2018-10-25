'use strict';

$(function(){
    $('.home-nav-link').click(function(e){
        e.preventDefault();

        var tab_id = $(this).attr('id');
        $('.home-nav-link').removeClass('active');
        $('#'+tab_id).addClass('active');
        getData(tab_id);

    });

    // send ajax request to get data (list posts || categories)
    function getData(id) {
        $.ajax(
            {
                url: id,
                type: "get",
                datatype: "html",
            })
            .done(function(data)
            {
                $("#list-data").empty().html(data);
            })
            .fail(function()
            {
                  alert('No response from server');
            });
    }
});