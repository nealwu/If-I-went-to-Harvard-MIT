<!DOCTYPE html>

<html>
  <head>
    <title>If I Went to Harvard</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#postform').submit(function() {
                makerequest();
                return false;
            });

            function makerequest() {
                $.ajax({
                        'url' : 'get_or_make_post.php',
                        'data' : {'newpost' : $('#newpost').html()},
                        'success' : function(data) {
                            // todo: parse data and add into our table                                                                                                                                              

                        }
                });
            }
        });
    </script>
  </head>

  <body>
  
    <div class="container">
      <h1>If I Went to Harvard</h1>

      <form id="postform">
        <textarea id="newpost"></textarea>
        <input type="submit">
      </form>

      <div id="currentposts">
      </div>

      <p>I would study really little.</p>
    </div>
  </body>
</html>
