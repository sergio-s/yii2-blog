
//$(document).on({
//  ready: function() {
//    return $('body').on('click', '.button-controll-group button', function(e) {
//       //do something
//    });
//  }
//});

jQuery(document).ready(function($){

//при использовании pjax нужно искать ,начиная с body
        $('body').on( "click",'a.comment-reply', function(event){

            event.preventDefault();
            var id = $(this).closest('.comment-reply').data('comment-id');
            var comment = $(this).closest('.comment-content');
            $('#comment-form').detach().appendTo(comment);
            $('#hiddenInputParentId').attr('value', id);
            //alert("Код" + id );
        });
});

//$(document).on('click', '.reply-link', function() {
//    var comment = $(this).closest('.comment');
//    $('#comment-form').detach().appendTo(comment);
//    $('#comment-parent_id').val(comment.data('id'));
//});