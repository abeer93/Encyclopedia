'use strict';

$(function(){

    var public_path = $('#pubicPath').val();

    $('.edit-post-btn').on('click', function(e){
        e.preventDefault();

        var post_id = $(this).attr('id');

        // get post data
        $.ajax(
            {
                url: public_path + '/post/' + post_id,
                type: "get",
                datatype: "json",
            })
            .done(function(data)
            {
                $("#modal-id-input").val(data['id']);
                $("#modal-title-input").val(data['title']);
                $("#modal-content-input").val(data['description']);
                $('#edit-post-modal').modal('show');
            })
            .fail(function()
            {
                  alert('Post not exist');
            });
    });

    $('#save-edit-post').on('click', function(e){
        var post_id = $("#modal-id-input").val();
        var post_title = $("#modal-title-input").val();
        var post_content = $("#modal-content-input").val();
        if(post_title !== " " && post_content !== " ") {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
            });
            jQuery.ajax({
               url: public_path + '/post/' + post_id,
               method: 'PUT',
               dataType: 'json',
               data: {title: post_title, content: post_content},
               success: function(result){
                $('#edit-post-modal').modal('hide');
            }});

        }
    });
});