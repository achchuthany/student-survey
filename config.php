<?php
date_default_timezone_set("Asia/Colombo"); 

//define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST')); // 127.0.250.1
//define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT')); // 3306
//define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME')); // admin
//define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD')); // 8ddTnst22X3Y
//define('DB_NAME','survey');
//define('DB_SOCKET', getenv('OPENSHIFT_MYSQL_DB_SOCKET')); //
//define('DB_STRING', getenv('OPENSHIFT_MYSQL_DB_URL')); // 


//define('DB_HOST','localhost' ); // 127.0.250.1
//define('DB_USER','root' ); // admin
//define('DB_PASS','' ); // 8ddTnst22X3Y
//define('DB_NAME','survey');

$now = date("Y-m-d H:i:s");

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

define('DB_HOST',$server ); // 127.0.250.1
define('DB_USER',$username ); // admin
define('DB_PASS',$password ); // 8ddTnst22X3Y
define('DB_NAME',$db);

//$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("Failed to connect to MySQL: ".mysqli_connect_error());
