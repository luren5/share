$(document).ready(function(){
    $('.comment_to').click(function() {
        var commnet_to = $(this).next('input').val();
        $('textarea').prev('span').html('回复<a href = "#comment_to" title = "点击取消@Ta">@' + commnet_to + '</a> :');
        $('#comment_to').val(commnet_to) ;
    
        $('textarea').prev('span').click(function() {
            $(this).html('');
            $('#comment_to').val('') ;
        });
    });
});