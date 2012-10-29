<?php session_start();
$logged_in = 0;
if (isset($_SESSION['user_email'])){$logged_in = 1;}
else {$logged_in = 0;}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PoliticalProgressBar -- Student Government Edition</title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <style type="text/css">
		div.ideabox {
			width:210px;
			height:210px;
			position:absolute;
			
		}
		
		.ideabox div.center{
			width:50px;
			height:50px;
			border:solid blue 1px;
			position:absolute;
			margin: auto auto;
			background-color: green
			
		}
		
		.ideabox div.substeps div {
			width:100px;
			height:100px;
			border:solid blue 1px;
			float:left
			
		}
    </style>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

    <style>
    .ui-progressbar .ui-progressbar-value { background-image: url(images/pbar-ani.gif); }
    </style>
	<script type="text/javascript">
		/*navigator.geolocation.getCurrentPosition(GetLocation);
		function GetLocation(location) {
			$.lat=0
			$.lng=0
			$.lat = location.coords.latitude;
			$.lng = location.coords.longitude;
		}*/

		function toggleHack(){
			var btn = $("#hackMode")
			btn.toggleClass("btn-primary")
			if (btn.val()){btn.val("on");btn.text("Disable Hack Mode");}
			else {btn.val("off");btn.text("Enable Hack Mode");}
		}

		function cont(){
			$.ajax({"url":"hackmodeonoff.php",
				"data":{"status":$("#hackMode").val(),"user_email":$("#email").val(),"lat":$.lat,"lng":$.lng,"skills":$("#skills").val(),"interests":$("#interests").val()},
				"success":function(data){
					localStorage.setItem("user_data", data);
					window.location.reload();
				}
			})
		}

		function nextSkill(){
			items=Array("Javascript","JQuery","PHP","Mobile","","","","","","","","","");
			var item_s = items[Math.floor(Math.random()*items.length)];
			return item_s;
		}
		function nextInterest(){
			items=Array("BikeSting","GraceGrader","IdeaOverflow","ClackerAlert","","","","","","","","","","");
			var item_s = items[Math.floor(Math.random()*items.length)];
			return item_s;
		}
		function load(){
			if (localStorage.getItem("user_data") != null){
				var table="<table class='table'><tr><th>Email</th><th width='500'>Progress Bar</th><th>I</th><th>Login Time</th></tr>";
				var data = $.parseJSON(localStorage.getItem("user_data"));
				for (i=0;i<data.length;i++){
					var time = new Date(data[i]["status_update_time"]*1000);
					table+="<tr><td><a href='mailto:"+data[i]['email']+"'>" + data[i]['email'] + "</a> </td><td>"+'<div class="progressbar"></div>'+"</td><td><a href='#'>"+data[i]['interests']+"</a></td><td>"+time.getHours()+":"+time.getMinutes()+" "+(time.getMonth()+1)+"/"+time.getDate()+"</td></tr>";
				}
				table += "</table>";
				$("#user_data").html(table);
				/*
				
				var ideadata = $.parseJSON({'center':'Kayaks','substeps':['Query Sailing Pavillion','Query Crew Boathouse','Query MITOC','Allocate money']});
				
				.append( $('<div/>', {className:'center',text:ideadata['center']} 
				.append( $('<div/>', {className:'substeps'} 
				
				idbs=$('.ideabox .substeps')
				idbs.append("<div/>",{text:ideadata['substeps'][i]})
				
				for (i=0;i<data['substeps'].length;i++){
					var time = new Date(data[i]["status_update_time"]*1000);
					table+="<tr><td><a href='mailto:"+data[i]['email']+"'>" + data[i]['email'] + "</a> </td><td>"+'<div class="progressbar"></div>'+"</td><td><a href='#'>"+data[i]['interests']+"</a></td><td>"+time.getHours()+":"+time.getMinutes()+" "+(time.getMonth()+1)+"/"+time.getDate()+"</td></tr>";
				}
				table += "</table>";
				$("#user_data").html(table);*/
			}
		}

$(document).ready(function(){
$( ".progressbar" ).html("aoeu");
        $( ".progressbar" ).progressbar({
			
            value: 59
        });
 });
    </script>

</head>
<body onLoad="load()">
<div class="container">

	<div class="well">
	<h1><a border="0" href="http://ideaoverflow.tk"><img src="ideagraphpaintico.jpg" height="50px" width="50px" /></a> MIT Suggestion Box
	  <!--<?php if($logged_in){echo "<a id='logout' class='pull-right' href='#'><button class='btn btn-primary'>Log Out</button></a>";}?> <br>
<a href="http://instadefine.com/IdeaOverflow/ATTHackathon/git/IdeaOverflow/index_copygraph.php" style="font-size:16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Projects_</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://hackathonprojects.tk" style="font-size:16px" target="_blank">HackathonProjects.tk</a>--></h1>
	</div>
	<div "width:100px;float:right">
		<?php 
			if($logged_in) {echo "<p class='lead'>Welcome {$_SESSION['user_email']}!";} 
			
		?>
		<div class="input-append">
			<input class="span11" id="email" type="text" placeholder="Add a suggestion!"><button class="btn" type="button" onClick="cont()">Go!</button></input>
		</div><!--
        <div class="input-append">
			<input class="span11" id="skills" type="text" placeholder="Skills"></input>
		</div>
        <div class="input-append">
			<input class="span11" id="interests" type="text" placeholder="Interests"></input>
		</div>-->
		<?php
			
		?>
	</div>
<div style="height:400px">
	<div class="ideabox">
    	<div class="center">Kayaks</div>
        <div class="substeps">
            <div>Query Sailing Pavillion</div>
            <div>Query Crew Boathouse</div>
            <div>Query MITOC</div>
            <div>Allocate money</div>
        </div>
    </div>
    </div>

    
    	<br />
	<?php 
		if(!$logged_in){
			//echo '<button id="hackMode" class="btn btn-block btn-large" onclick="toggleHack()" value="off">Enable Hack Mode</button>';
			}
		else {
			//echo '<button id="hackMode" class="btn btn-block btn-large" onclick="toggleHack()" value="off">Disable Hack Mode</button>';
			echo '<div id="user_data"></div>';}
	?>
	
</div>
<script type="text/javascript">
        $( ".progressbar" ).progressbar({
			
            value: 59
        });
</script>
</body>
</html>
