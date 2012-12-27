<!DOCTYPE html>

<html>
  <head>
    <title>If I Went to Harvard I would...</title>
    
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="client.js"></script>
  </head>
  
  <body>
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) return;
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=348071421871295";
           fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));</script>

    <div class="container">
      <div class="fb-like" data-href="http://ifiwentto.tk/" data-send="true" data-width="450" data-show-faces="true"></div>

      <h1>If I went to Harvard I would...</h1>
      
      <form id="postform">
        <div class="input-append">
          <textarea class="span11" placeholder="Enter your own dreams here!" id="newpost"></textarea>
          <input class="btn" type="submit"></input>
        </div>
      </form>
      
      
      <div id="currentposts"></div>

    <div id="disqus_thread"></div>
    <script type="text/javascript">
     /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
     var disqus_shortname = 'ifiwenttoharvard'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function() {
    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
    dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
})();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
    </div>
  </body>
</html>