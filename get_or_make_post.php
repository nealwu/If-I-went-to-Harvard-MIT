<?php
require_once('mysql.php');

$body = mysqli_real_escape_string($_REQUEST['newpost']);
$time = time();

if (!empty($body)) {
    $query = "INSERT INTO posts VALUES ('', $time, '$body')";
    print $query . "\n\n";
    $result = mysql_query($query) or die("SELECT Error: " . mysql_error());
}

$query = "SELECT * FROM posts ORDER BY time DESC";
$result = mysql_query($query) or die("SELECT Error: " . mysql_error());

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
    $rows []= $r;
}
print json_encode($rows);