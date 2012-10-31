<?php
require_once('mysql.php');

$body = mysqli_real_escape_string($MYSQLI_LINK, $_REQUEST['newpost']);
$time = time();

if (!empty($body)) {
    $query = "INSERT INTO posts VALUES ('', $time, '$body', '')";
    $result = mysqli_query($MYSQLI_LINK, $query) or die("SELECT Error: " . mysqli_error($MYSQLI_LINK));
}

$query = "SELECT * FROM posts ORDER BY time DESC";
$result = mysqli_query($MYSQLI_LINK, $query) or die("SELECT Error: " . mysqli_error($MYSQLI_LINK));

$rows = array();
while ($r = mysqli_fetch_assoc($MYSQLI_LINK, $result)) {
    $rows []= $r;
}
print json_encode($rows);