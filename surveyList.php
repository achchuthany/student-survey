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
        <div class="row">
            <div class="col-md-12">
                <div class=" page-header">
                    <h3>Survey List</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
<a href="surveyForm.php">
        <button type="button" class="btn btn-info">
        <span class="glyphicon glyphicon-plus-sign"></span> Create New Survey
        </button>  
    
    </a>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>



        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Module</th>
                                <th>Trainer</th>
                                <th>Term</th>
                                <th>Date Taken</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Module</th>
                                <th>Trainer</th>
                                <th>Term</th>
                                <th>Date Taken</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                        $sql = "
                    SELECT
                          department.department AS department,
                          module.module AS module,
                          surveytoken.module_id as module_id,
                          surveytoken.course_id AS course_id,
                          surveytoken.trainer_id AS trainer_id,
                          trainer.trainer AS trainer,
                          term.term AS term,
                          term.academic_year AS academic_year,
                          course.course AS course,
                          surveytoken.date_valid AS date_valid,
                          surveytoken.department_id AS department_id,
                          surveytoken.is_valid as is_valid,
                          surveytoken.token as token
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
                    ";
                        $now = date("Y-m-d H:i:s");
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                               if($now <= $row["date_valid"]) echo '<tr class="success">';
                               else echo '<tr class="warning">';

                            echo    '<td>'. $row["department_id"]. '</td>
                                    <td>'. $row["course"]. '</td>
                                    <td>'. $row["module"]. '</td>
                                    <td>'. $row["trainer"]. '</td>
                                    <td> '. $row["term"]. ' ('.$row["academic_year"].')</td>
                                    <td>'. $row["date_valid"]. '</td>
                                    <td>
                                    
                                    
                                    <a href="surveyProfile.php?token='. $row["token"].'"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View Summary Report"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>  </button></a>
                                    
                                    
                                        <a target="_blank" href="student-survey.php?token='. $row["token"].'"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View Survey Form"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></button></a>
                                        
                                        <a target="_blank" href="inviteStudents.php?token='. $row["token"].'"><button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="E-mail Invition for Students"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> </button></a>
                                        
                                        
                                    </td>

                                </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6"> 0 Results</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
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
        
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
</body>

</html>
