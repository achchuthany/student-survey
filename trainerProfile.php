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
    <?php if(isset($_GET["tariner_id"])) { $trainer_id = $_GET["tariner_id"]; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>Trainer Survey Profile <small class="success">EPF No. :
                        <?php echo $trainer_id;?> </small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Module</th>
                                <th>Term</th>
                                <th>Date Valid</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Course</th>
                                <th>Module</th>
                                <th>Term</th>
                                <th>Date Valid</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                        $sql = "
SELECT
  department.department AS department,
  module.module AS module,
  surveytoken.module_id AS module_id,
  surveytoken.course_id AS course_id,
  surveytoken.trainer_id AS trainer_id,
  trainer.trainer AS trainer,
  term.term AS term,
  course.course AS course,
  surveytoken.date_valid AS date_valid,
  surveytoken.department_id AS department_id,
  surveytoken.is_valid AS is_valid,
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
  surveytoken.trainer_id = '$trainer_id'
                        
                        ";
                        $now = date("Y-m-d H:i:s");
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                if($now <= $row["date_valid"]) echo '<tr class="success">';
                                else echo '<tr class="warning">';
                                echo '
                                    <td>'. $row["course"].'</td>
                                    <td>'. $row["module_id"].'-'.$row["module"].'</td>
                                    <td>'. $row["term"].'</td>
                                    <td>'. $row["date_valid"].'</td>
                                    <td><a href="surveyProfile.php?token='.$row["token"].'">Survey Profile</td>
                                    
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
    <?php } ?>

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
