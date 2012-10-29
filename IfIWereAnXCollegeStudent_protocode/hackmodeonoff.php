<?php
session_start();

include("mysql.php");
	
/*$q="SELECT id FROM users WHERE email='{$_REQUEST['email']}'";
echo $q."\n\n";
$result=mysql_query($q) or die("SELECT Error: ".mysql_error());

$rows = array();
while($r = mysql_fetch_assoc($sth)) {
	$rows[] = $r;
}
print json_encode($rows);
*/
$_REQUEST['lat']=0;
$_REQUEST['lng']=0;
$sts = $_REQUEST['status']=="on" ? 1 : 0;
$loginparams=array('email'=>"'".$_REQUEST['user_email']."'", 'latitude'=>$_REQUEST['lat'], 'longitude'=>$_REQUEST['lng'], 'status'=>$sts,'status_update_time'=>time(),'skills'=>"'".$_REQUEST['skills']."'", 'interests'=>"'".$_REQUEST['interests']."'");

$q="SELECT id FROM users WHERE email='{$_REQUEST['user_email']}'";
//echo $q."\n\n";
$result=mysql_query($q) or die("SELECT Error: ".mysql_error());
$rows = array();
while($r = mysql_fetch_assoc($result)) {
	$rows[] = $r;
}
if(count($rows)>0) { //if you're an existing user 
/*
	function implodeItem(&$item, $key) // Note the &$item
	{
	  $item = $key . "=" . $item;
	}	
	array_walk($loginparams, "implodeItem");
	
	$q="UPDATE users SET (".implode(',', $loginparams).") WHERE email='{$_SESSION['user_email']}'" ;	
	*/
	$q="UPDATE users SET status_update_time=".time()." WHERE email='{$_SESSION['user_email']}'" ;	
	
	$result=mysql_query($q) or die("SELECT Error: ".mysql_error());
	
/*	if(!$_SESSION['user_email'])
		die('Need $_SESSION[\'user_email\']');
	
	

	$q="UPDATE users (email, latitude,longitude,status,status_update_time) SET (".implode(',', $loginparams).") WHERE email='{$_SESSION['user_email']}'" ;
	echo $q."\n\n";
	$result=mysql_query($q) or die("SELECT Error: ".mysql_error());
	*/
}
else {
	$q='INSERT INTO users (email, latitude,longitude,status,status_update_time,skills,interests) VALUES ('.implode(',', $loginparams).')';
	//echo $q."\n\n";
	$result=mysql_query($q) or die("SELECT Error: ".mysql_error());
}

$_SESSION['user_email']=$_REQUEST['user_email'];


$q="SELECT * FROM users WHERE email <> '{$_SESSION['user_email']}' ORDER BY status_update_time DESC";
//$q="SELECT * FROM users ORDER BY status_update_time DESC";

//echo $q."\n\n";
$result=mysql_query($q) or die("SELECT Error: ".mysql_error());

$rows = array();
while($r = mysql_fetch_assoc($result)) {
	$rows[] = $r;
}
print json_encode($rows);

?>