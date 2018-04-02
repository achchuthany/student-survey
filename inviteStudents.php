<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Satisfaction Survey at SLGTI </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
    function showModule(val)
    {
         $.ajax({
             type: 'post',
             url: 'getModule.php',
             data: {
              getModule:val
             },
             success: function (response) {
                document.getElementById("Module").innerHTML=response; 
             }
         });
    }

</script>
    
</head>

<body>
    <?php include_once("nav.php");    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=" page-header">
                    <h3>E-mail Invition of Students for Survey</h3>                  
                </div>
            </div>
             
            </div>
             
        

        <div class="row">
            <div class="col-md-12">
                <?php
                    
                    if(isset($_GET['token'])){
                         $token = $_GET["token"];
                        $sql = "
                    SELECT
                          department.department AS department,
                          module.module AS module,
                          surveytoken.module_id as module_id,
                          surveytoken.course_id AS course_id,
                          surveytoken.trainer_id AS trainer_id,
                          trainer.trainer AS trainer,
                          term.term AS term,
                          term.term_id AS term_id,
                          term.academic_year AS academic_year,
                          course.course AS course,
                          surveytoken.date_created AS date_created,
                          surveytoken.date_valid AS date_valid,
                          surveytoken.department_id AS department_id,
                          surveytoken.is_valid as is_valid
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
                          surveytoken.token = '$token'                   
                    
                    ";
                     $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_assoc($result);
                                $token_valid= $row["date_valid"];  
                                $is_valid = $row["is_valid"];
                                $department = $row["department"];
                                $department_id = $row["department_id"];
                                $module = $row["module"];
                                $module_id = $row["module_id"];
                                $course = $row["course"];
                                $course_id = $row["course_id"];
                                $trainer = $row["trainer"];
                                $trainer_id = $row["trainer_id"];
                                $term = $row["term"];
                                $term_id = $row["term_id"];
                                $academic_year=$row["academic_year"];
                                $date_valid=$row["date_valid"];
                                $date_created=$row["date_created"];
                        }                  
                      
                    }
                ?>
                
            </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <label class="control-label">Department </label>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <?php echo $department;?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <label class="control-label">Created Date: </label>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-12">
                            <?php  echo $date_created;  ?>

                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-12">
                            <label class="control-label">Valid Until: </label>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-12">
                            <?php  echo $date_valid; ?>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <label class="control-label">Course: </label>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-8">
                            <?php echo $course;?>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <label class="control-label">Module: </label>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-8">
                            <?php echo $module;?>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <label class="control-label">Teacher’s Name: </label>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-8">
                            <?php echo $trainer;?>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <label class="control-label">Study Term: </label>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-8">
                            <?php echo $term.' ('. $academic_year.')';?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="panel panel-warning">
            <div class="panel-heading">
                <h4>E-mail Message</h4>
            </div>
            <div class="panel-body">        
        <div class="row">
            <div class="col-md-12">
            <?php
    
    $mail->Subject = 'SLGTI - Survey Email Invitational 2017';

    $mail->addAttachment('images/SLGTI-Logo-1.png');

    $links = null;

    $links = $links .'<p> <a href="http://'.DB_HOST.'/slgti-student-survey/student-survey.php?token='.$token.'" target="_blank">'.$module.' in '.$course.' trained by '.$trainer.' -  '.$term.' ('.$academic_year.') </a> </p>';    

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
    $sql = "SELECT              
    `enrollcourse`.`student_id` AS `student_id`,
    `student`.`firstname` AS `firstname`,
    `student`.`lastname` AS `lastname` ,
    `student`.`email` AS `email`
    FROM `enrollcourse` 
    LEFT JOIN  `student` ON  `enrollcourse`.`student_id` = `student`.`student_id`
    WHERE `enrollcourse`.`course_id` = '$course_id' AND `enrollcourse`.`academic_year` = '$academic_year'
    ";

    $result = mysqli_query($con, $sql);

/*    foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
        $mail->addAddress($row['email'], $row['student_id']);
        if (!$mail->send()) {
            echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
            break; //Abandon sending
        } else {
            echo "Message sent to :" . $row['student_id'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
            //Mark it as sent in the DB
            $student_id=$row['student_id'];
            $sql = "INSERT INTO `mailinglog` (`student_id`, `module_id`, `term_id`, `date_sent`, `sent`) VALUES ('$student_id', '$module_id', '$term_id', CURRENT_TIMESTAMP, '1')";
            mysqli_query( $con,$sql);
        }
        // Clear all addresses and attachments for next loop
        $mail->clearAddresses();
        $mail->clearAttachments();
    }*/

?>
            </div>
        </div>
    </div>
</div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>Enrolled Students e-mail invitation status</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>E-mail Status</th>
                        </tr>
                        <?php
                             $sql = "SELECT 

                            `enrollcourse`.`student_id` AS `student_id`,
                            `student`.`firstname` AS `firstname`,
                            `student`.`lastname` AS `lastname` ,
                            `student`.`email` AS `email`
                            

                            FROM `enrollcourse` 

                            LEFT JOIN  `student` ON  `enrollcourse`.`student_id` = `student`.`student_id`

                            WHERE `enrollcourse`.`course_id` = '$course_id' AND `enrollcourse`.`academic_year` = '$academic_year'
                             ";
                            $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $student_id = $row['student_id'];
                                         $sql2 = "SELECT * FROM `mailinglog` WHERE `student_id`='$student_id' AND `module_id`='$module_id' AND `term_id`='$term_id' ORDER BY `date_sent` DESC LIMIT 1";
                                        $SENT = NULL;
                                        $STATUS = 0;
                                        $result2 = mysqli_query($con, $sql2);                                  
                                        if (mysqli_num_rows($result2) == 1){
                                            $row2 = mysqli_fetch_assoc($result2);
                                            
                                                 $SENT = $row2['date_sent'];
                                                $STATUS = $row2['sent'];
                                        }
                                        echo'
                                             <tr>
                                                <td>'.$row['student_id'].'</td>
                                                <td>'.$row['firstname'].'</td>
                                                <td>'.$row['lastname'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td><button class="btn btn-xs btn-success"><SPAN CLASS="glyphicon glyphicon-ok-sign"> </SPAN> '.$SENT.' </button></td>
                                            </tr>
                                        
                                        ';
                                    }
                                }
                                ?>
                       
                    </table>
                </div>
                        </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php include_once("footer.php"); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [5, "desc"],
                    [4, "desc"]
                ]
            });
        });

    </script>
</body>

</html>
