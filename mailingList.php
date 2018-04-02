<?php


//Set the subject line
$mail->Subject = 'SLGTI - Survey Email Invitational 2017';

$mail->addAttachment('images/SLGTI-Logo-1.png');

$links = null;

            

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $links = $links .'<p> <a href="http://'.DB_HOST.'/slgti-student-survey/student-survey.php?token='.$row["token"].'" target="_blank">'.$row["module"].' in '.$row["course"].' trained by '.$row["trainer"].' -  '.$row["term"].' </a> </p>';
        }
    }

echo $body = '
<h2>Student Satisfaction Survey at Sri Lanka German Training Institute </h2>

<h3>To continue into the survey, please follow this link:</h3>
'.$links.'
<p>Thank you. </p>
<p><i>Your contribution to this important project is much appreciated.</i></p>
<p><i>Survey Support Team</i></p>
<p><i>SLGTI</i></p>';

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop
$mail->msgHTML($body);
//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database

$result = mysqli_query($con, 'SELECT * FROM `student`');

//foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
//    $mail->addAddress($row['email'], $row['student_id']);
////    if (!empty($row['photo'])) {
////        $mail->addStringAttachment($row['photo'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
////    }
//
//    if (!$mail->send()) {
//        echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
//        break; //Abandon sending
//    } else {
//        echo "Message sent to :" . $row['student_id'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
//        //Mark it as sent in the DB
////        mysqli_query(
////            $mysql,
////            "UPDATE mailinglist SET sent = true WHERE email = '" .
////            mysqli_real_escape_string($mysql, $row['email']) . "'"
////        );
//    }
//    // Clear all addresses and attachments for next loop
//    $mail->clearAddresses();
//    $mail->clearAttachments();
//}
