getPosts();

$(document).ready(function() {
    $('#postform').submit(function() {
        submitPostAndGetPosts();
        return false;
    });
});

function timeToString(hours, minutes) {
    var xm = hours < 12 ? "am" : "pm";
    
    // Convert hours from 0-24 to 1-12.
    hours = (hours + 11) % 12 + 1;
    
    if (minutes < 10)
        minutes = "0" + minutes;
    
    return hours + ":" + minutes + " " + xm;
}

function dateToString(month, day) {
    month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"][month];
    return month + " " + day;
}

function nl2br(str) {
    return str.replace(/\n/g, '<br>');
}

function displayPosts() {
    if (localStorage.getItem("posts") !== null){
        var jsonData = localStorage.getItem("posts");
        var data = $.parseJSON(jsonData);
        var table = "<table class='table'>" // <tr> <th>Post Body</th> <th>User</th> <th>Time</th> </tr>";
        
        for (var i = 0; i < data.length; i++) {
            var time = new Date(data[i].time * 1000);
            table += "<tr><td>" + '<div class="fb-like" data-href="http://ifiwentto.tk/post.php?pid=' + data[i].pid + '" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false"></div>' +
                "</td><td>" + nl2br(data[i].body) +
                "</td><td><a href='#'>" + data[i].uid + "</a>" +
                "</td><td class='timecol'>" + dateToString(time.getMonth(), time.getDate()) + ", " + timeToString(time.getHours(), time.getMinutes()) +
                "</td></tr>";
        }
        
        table += "</table>";
        $("#currentposts").html(table);
    }
}

function submitPostAndGetPosts() {
    $.ajax({
            'url': 'get_or_make_post.php',
            'data': {'newpost': $('#newpost').val()},
            'success': function(jsonData) {
                 // todo: parse data and add into our table
                localStorage.setItem("posts", jsonData);
                $('#newpost').val('');
                displayPosts();
            },
    });
}

function getPosts() {
    $.ajax({
            'url': 'get_or_make_post.php',
            'data': {'newpost': ''},
            'success': function(jsonData) {
                 localStorage.setItem("posts", jsonData);
                 displayPosts();
            },
    });
}