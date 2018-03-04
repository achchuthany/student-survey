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
</head>

<body>
    <?php include_once("nav.php");    ?>

    <div class="container">
        <div>
            <div>
                <?php
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
                          course.course AS course,
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
                            
                        }
                
//get data from 
                $catA1 = $catA2 = $catA3 = $catA4 = $catA5 = $catA6 = $catA7 = $catA8 = $catA9 = 0;

                $catB1 = $catB2 = $catB3 = $catB4 = $catB5 = $catB6 = $catB7 = $catB8 = $catB9 = 0;
       
                $catC1 = $catC2 = $catC3 = NULL;
                
                $count = 0;
                
                    $sql = "SELECT * FROM `surveyrecords` WHERE `token` = '$token'";
                    $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                        $catA1 = $catA1 + $row["catA1"];
                                        $catA2 = $catA2 + $row["catA2"]; 
                                        $catA3 = $catA3 + $row["catA3"]; 
                                        $catA4 = $catA4 + $row["catA4"]; 
                                        $catA5 = $catA5 + $row["catA5"]; 
                                        $catA6 = $catA6 + $row["catA6"]; 
                                        $catA7 = $catA7 + $row["catA7"]; 
                                        $catA8 = $catA8 + $row["catA8"]; 
                                        $catA9 = $catA9 + $row["catA9"]; 
                                
                                        $catB1 = $catB1 + $row["catB1"];
                                        $catB2 = $catB2 + $row["catB2"]; 
                                        $catB3 = $catB3 + $row["catB3"]; 
                                        $catB4 = $catB4 + $row["catB4"]; 
                                        $catB5 = $catB5 + $row["catB5"]; 
                                        $catB6 = $catB6 + $row["catB6"]; 
                                        $catB7 = $catB7 + $row["catB7"]; 
                                        $catB8 = $catB8 + $row["catB8"]; 
                                        $catB9 = $catB9 + $row["catB9"]; 
                                
                                
                                        $catC1 = $catC1 . '<P>'.$row["catC1"].'</P>';
                                        $catC2 = $catC2 . '<P>'.$row["catC2"].'</P>';
                                        $catC3 = $catC3 . '<P>'.$row["catC3"].'</P>';
                                        
                                        $count++;
                                
                            }
                        } else {
                            //echo '<tr><td colspan="6"> 0 Results</td></tr>';
                        }
?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11">
                <div class=" page-header">
                    <h3>Survey Profile</h3>
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm" onClick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
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
                        <div class="col-md-2 ">
                            <label class="control-label">Score: </label>
                        </div>
                        <div class="col-md-4">
                            <?php if($count!= 0) 
                                    echo sprintf("%01.2f" , ($catA1 + $catA2 + $catA3 + $catA4 + $catA5 + $catA6 + $catA7 + $catA8 + $catA9 + $catB1 + $catB2 + $catB3 + $catB4 + $catB5 + $catB6 + $catB7 + $catB8 + $catB9)/($count*18));
                                    else echo'0.00';
                            ?>/5.00

                        </div>

                        <div class="col-md-2">
                            <label class="control-label">Number of Records: </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $count; ?>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Course: </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $course;?>
                        </div>

                        <div class="col-md-2">
                            <label class="control-label">Module: </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $module;?>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">Teacher’s Name: </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $trainer;?>
                        </div>

                        <div class="col-md-2">
                            <label class="control-label">Study Term: </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $term;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>General Conditions & Module Evaluation: Questions concerning the teaching situation at SLGTI</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">

                    <div class="row radio">
                        <div class="col-md-10">

                            <h4>Questons</h4>

                        </div>
                        <div class="col-md-2">

                            <h4>Total Score</h4>

                        </div>

                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label">
                                1  The class size/group makes it comfortable to study effectively
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA1; ?>
                            </label>
                        </div>

                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 2  The facilities provided enable effective learning                        </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA2; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 3  The concept of the module and its content provide a perfect balance of theoretical and practical content </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA3; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 4  The module content provides an high level of difficulty </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA4; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 5  The module content provides practical applicability  </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA5; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 6  The module/course material helps me understand the lesson               (script, hand-outs, etc.)</label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA6; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 7  The workload of the module is reasonable                                       </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA7; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 8   Internet access is provided to encourage e-learning                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA8; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label">9   Overall, I am satisfied with this module  </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catA9; ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>Teacher Evaluation: Questions concerning the teacher performance at SLGTI</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label">
                                      1  The teacher explains the subject clearly and in ways that are easy to understand 
                                    </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB1; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 2  The teacher is knowledgeable in the subject area                             </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB2; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 3  The teacher is well prepared and organized for class </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB3; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 4  The teacher is enthusiastic about teaching the course and stimulates            student interest</label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB4; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 5  The teacher uses a variety of teaching methods (discussion, group work,         
                                     presentation, practical examples, etc.) during class time, and makes the
                                     lesson interesting
                                  </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB5; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label">6 The teacher is punctual for class                                                 </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB6; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 7  The teacher is friendly and approachable by showing interest and care               for the students. The teacher takes time when explaining a topic to ensure 
                                        the subject is understood.
                                    </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB7; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label"> 8  The teacher uses assessment methods which are fair and appropriate             </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB8; ?>
                            </label>
                        </div>
                    </div>

                    <div class="row radio">
                        <div class="col-md-10">
                            <label class="control-label">9  Overall, I am satisfied with this teacher                                        </label>
                        </div>
                        <div class="col-md-2">
                            <label class="control-label">
                                <?php echo $catB9; ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>Comments</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">What did you particularly like in this course/module? </label>
                            <?php echo $catC1; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">What changes / improvements would you suggest?</label>
                            <?php echo $catC2; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Any other comment?</label>
                            <?php echo $catC3; ?>
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
                    [0, "asc"]
                ]
            });
        });

    </script>
</body>

</html>
