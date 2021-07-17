"use strict";
$(document).ready(function() {
    $('#test').on('click',function(){
        var link = $(this).data('url');
        alert('link');
        $.ajax({
            type: 'post',
            url: link,
            dataType:'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            },
            beforeSend: function(data){
                console.log('start');
            },
            success: function(data){
                console.log('running');
            },
            complete: function(data){
                var value = ('#title').val();
                $('#result').val()= value;
            }
        });
    });


    $('#softDelete2').on('click',function(){
        var link = $(this).data('url');
        alert(link);
        $.ajax({
            type: 'get',
            url: link,
            dataType:'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            },
            beforeSend: function(){
                console.log('start');
            },
            success: function(){
                console.log('running');
            },
            complete: function(){
                console.log('complete');
            }
        });
    });

});