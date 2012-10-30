$(document).ready(function() {
    $('#postForm').submit(function() {
        makerequest();
        return false;
    });

    function makerequest() {
        $.ajax({
                'type': 'GET',
                'url': 'get_or_make_post.php',
                'data': {'newpost': $('#newpost').val()},
                'success': function(data) {
                     // todo: parse data and add into our table                                                                                                                                    
                },
        });
    }
});