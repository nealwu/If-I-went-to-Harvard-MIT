<?php
define('DB_USER', 'ifiwentto');
define('DB_PASS', 'neal&jacob');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ifiwentto');

mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);