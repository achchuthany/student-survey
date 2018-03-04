<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Satisfaction Survey Form </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include_once("nav.php");    ?>
    <!-- start token check-->
    <?php if(isset($_GET["token"])){?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $get_token = $_GET["token"];
                    
                    $now = date("Y-m-d H:i:s");
                        
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
                          surveytoken.is_valid as is_valid,
                          surveytoken.term_id as term_id,
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
                          surveytoken.token = '$get_token'                   
                    
                    ";
                        $is_token = false;
                        $is_valid = 0;
                        $token_valid = null;
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
                                $token = $row["token"];
                            
                        }else{
                            echo '<div class="alert alert-danger" role="alert">Invalid Token</div>';
                             $is_token = false;
                        }
                        
                       
                    if($now > $token_valid){ $is_token = false; } 
    
                    if($is_valid==1 && ($now <= $token_valid)){ $is_token = true; }
    
                    if(isset($_POST["submit"])){
                        include_once("survey.php");
                    }
                        
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="page-header">
                    <h1>Student Satisfaction Survey at SLGTI
                        <?php 
                        if($is_token) echo '<small class="btn btn-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Token is valid until '.$token_valid.'</small>';
                        else echo '<small class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Token is Expired on '.$token_valid.'</small>';
                        ?>
                    </h1>
                </div>
            </div>
            <div class="col-md-2">
                <div class="page-header">
                    <img src="images/SLGTI-Logo-1.png" width="150">
                </div>
            </div>
        </div>
        <?php if($is_token) { ?>
        <div class="row">
            <div class="col-md-12">
                <p class="lead text-justify"> Dear students, thank you for participating in our survey about educational quality at SLGTI. The information you provide will enable us to assess current quality and identify measures required to improve educational quality at SLGTI. Information provided is confidential and will be used solely within the framework of this survey. We will not disclose your personal information to third parties, except in response to legal requirements. Please read following statements carefully and evaluate truthfully from <b>1 = “strongly disagree” to 5 = “strongly agree” </b>. Try to answer every question. If you feel uncertain, answer instinctively.
                </p>
            </div>
        </div>

        <form method="post" action="">

            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label">Department </label>
                            </div>
                            <div class="col-md-8">
                                <?php echo $department;?>
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
                            <div class="col-md-8">
                                <label class="control-label">
                                      1  The class size/group makes it comfortable to study effectively
                                    </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA1"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA1"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA1"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA1"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA1"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 2  The facilities provided enable effective learning                        </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA2"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA2"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA2"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA2"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA2"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 3  The concept of the module and its content provide a perfect balance of theoretical and practical content </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA3"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA3"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA3"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA3"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA3"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 4  The module content provides an high level of difficulty </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA4"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA4"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA4"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA4"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA4"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 5  The module content provides practical applicability  </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA5"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA5"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA5"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA5"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA5"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 6  The module/course material helps me understand the lesson               (script, hand-outs, etc.)</label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA6"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA6"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA6"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA6"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA6"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 7  The workload of the module is reasonable                                       </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA7"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA7"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA7"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA7"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA7"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 8   Internet access is provided to encourage e-learning                            </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA8"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA8"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA8"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA8"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA8"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label">9   Overall, I am satisfied with this module  </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catA9"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA9"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA9"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA9"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catA9"   value="5" required> 5
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
                            <div class="col-md-8">
                                <label class="control-label">
                                      1  The teacher explains the subject clearly and in ways that are easy to understand 
                                    </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB1"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB1"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB1"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB1"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB1"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 2  The teacher is knowledgeable in the subject area                             </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB2"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB2"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB2"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB2"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB2"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 3  The teacher is well prepared and organized for class </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB3"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB3"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB3"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB3"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB3"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 4  The teacher is enthusiastic about teaching the course and stimulates            student interest</label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB4"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB4"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB4"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB4"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB4"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 5  The teacher uses a variety of teaching methods (discussion, group work,         
                                     presentation, practical examples, etc.) during class time, and makes the
                                     lesson interesting
                                  </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB5"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB5"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB5"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB5"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB5"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> The teacher is punctual for class                                                 </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB6"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB6"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB6"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB6"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB6"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 7  The teacher is friendly and approachable by showing interest and care               for the students. The teacher takes time when explaining a topic to ensure 
                                        the subject is understood.
                                    </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB7"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB7"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB7"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB7"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB7"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label"> 8  The teacher uses assessment methods which are fair and appropriate             </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB8"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB8"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB8"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB8"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB8"   value="5" required> 5
                                    </label>
                            </div>
                        </div>

                        <div class="row radio">
                            <div class="col-md-8">
                                <label class="control-label">9  Overall, I am satisfied with this teacher                                        </label>
                            </div>
                            <div class="col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="catB9"   value="1" required> 1
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB9"   value="2" required> 2
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB9"   value="3" required> 3
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB9"   value="4" required> 4
                                    </label>
                                <label class="radio-inline">
                                    <input type="radio" name="catB9"   value="5" required> 5
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
                                <textarea class="form-control" name="catC1" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">What changes / improvements would you suggest?</label>
                                <textarea class="form-control" name="catC2" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Any other comment?</label>
                                <textarea class="form-control" name="catC3" rows="3"></textarea>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-offset-10 col-md-2">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>

            </div>
        </form>
        <?php } ?>
    </div>
    <!-- end token check-->
    <?php }?>
    <?php include_once("footer.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
