<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set("Asia/Colombo"); 
require 'config.php'; 
require 'PHPMailer/PHPMailerAutoload.php';

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

//Set the subject line
$mail->Subject = 'SLGTI - Survey Email Invitational 2017';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('survey.html'), dirname(__FILE__));


//Attach an image file
//$mail->addAttachment('examples/images/phpmailer_mini.png');
$links = null;

            $sql = "SELECT
                    department.department AS department,
                    module.module AS module,                                       
                    trainer.trainer AS trainer,
                    term.term AS term,
                    course.course AS course,
                    surveytoken.date_valid AS date_valid,
                    surveytoken.token AS token
                        FROM
                          surveytoken

                        LEFT JOIN
                          department
                        ON
                          surveytoken.department_id = department.department_id
                        LEFT JOIN
                          module
                        ON
                          surveytoken.module_id = module.module_id
                        LEFT JOIN
                          course
                        ON
                          surveytoken.course_id = course.course_id LEFT
                        JOIN
                          trainer
                        ON
                          surveytoken.trainer_id = trainer.trainer_id
                        LEFT JOIN
                          term
                        ON
                          surveytoken.term_id = term.term_id
                          
                        WHERE
                        is_valid = '1'
                          ";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $links = $links .'<p> <a href="http://www.slgti.achchuthan.org/student-survey/student-survey.php?token='.$row["token"].'" target="_blank">'.$row["module"].' in '.$row["course"].' trained by '.$row["trainer"].' -  '.$row["term"].' </a> </p>';
        }
    }





//Set who the message is to be sent to
$mail->addAddress('info@achchuthan.org', 'Achchuthan Yogarajah');

echo $body = '
<h2>Student Satisfaction Survey at Sri Lanka German Training Institute </h2>

<h4>To continue into the survey, please follow this link:</h4>
'.$links.'
<p>Thank you. </p>
<p><i>Your contribution to this important project is much appreciated.</i></p>
<p><i>Survey Support Team</i></p>
<p><i>SLGTI</i></p>';

$mail->msgHTML($body);
//Replace the plain text body with one created manually
$mail->AltBody = 'Student Satisfaction Survey at Sri Lanka German Training Institute';

//send the message, check for errors
if (!$mail->send()) { echo "Mailer Error: " . $mail->ErrorInfo; } else { echo "Message sent!"; }
?>
