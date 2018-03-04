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
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Module</th>
                                <th>Trainer</th>
                                <th>Term</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Module</th>
                                <th>Trainer</th>
                                <th>Term</th>
                                <th>Date Created</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                        $sql = "
                    SELECT
  surveyrecords.id,
  module.module AS module,
  department.department AS department,
  course.course AS course,
  trainer.trainer AS trainer,
  term.term AS term,
  surveyrecords.date_created AS date_created
FROM
  surveyrecords
LEFT JOIN
  module
ON
  surveyrecords.module_id = module.module_id
LEFT JOIN
  department
ON
  surveyrecords.department_id = department.department_id
LEFT JOIN
  course
ON
  surveyrecords.course_id = course.course_id
LEFT JOIN
  trainer
ON
  surveyrecords.trainer_id = trainer.trainer_id
LEFT JOIN
  term
ON
  surveyrecords.term_id = term.term_id
                        
                        ";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <tr>
                                    <td>'. $row["id"]. '</td>
                                    <td>'. $row["department"]. '</td>
                                    <td>'. $row["course"].'</td>
                                    <td>'. $row["module"].'</td>
                                    <td>'. $row["trainer"].'</td>
                                    <td>'. $row["term"].'</td>
                                    <td>'. $row["date_created"].'</td>
                                    
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
