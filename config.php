<?php
date_default_timezone_set("Asia/Colombo"); 

define('DB_HOST','localhost' ); // 127.0.250.1
define('DB_USER','root' ); // admin
define('DB_PASS','' ); // 8ddTnst22X3Y
define('DB_NAME','survey');

$now = date("Y-m-d H:i:s");
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("Failed to connect to MySQL: ".mysqli_connect_error());

//mail configuration
error_reporting(E_STRICT | E_ALL);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$body = file_get_contents('contents.html');

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.zoho.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "survey@achchuthan.org";

//Password to use for SMTP authentication
$mail->Password = "!2qwasZX";

//Set who the message is to be sent from
$mail->setFrom('survey@achchuthan.org', 'Survey SLGTI');

//Set an alternative reply-to address
$mail->addReplyTo('no-replay@achchuthan.org', 'no-replay Survey SLGTI');

?>