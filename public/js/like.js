var postId = 0;

$('.like').on('click', function(event){

    event.presentDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        metod : 'POST',
        url: urlLike,
        data : {isLike, postId: postId, _token: token}
    })
    .done(function(){
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You Like this post' : 'like' :
        event.target.innerText = 'Dislike' ? 'You Dont this post' : 'Dislike';
        if (isLike) {
            event.target.nextElementSibling.innerText = 'Dislike';
        } else {
            event.target.previousElementSibling.innerText = 'Like';
        }
    });

});
 