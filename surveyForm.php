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
                    <h3>Survey Request Form</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php
                    
                    if(isset($_POST['surveyRequest'])){
                        $token=$_POST['token'];
                        $course_id=$_POST['course'];
                        $module_id=$_POST['module'];
                        $trainer_id=$_POST['trainer'];
                        $term_id=$_POST['academic'];
                        $date_valid=$_POST['date'];
                        
                        $sql = "SELECT * FROM `course` WHERE    `course_id`='$course_id'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $department_id = $row['department_id'];
                            }
                        }
                         $sql = "
                            INSERT INTO `surveytoken` 
                            (`id`, `token`, `is_valid`, `date_created`, `date_valid`, `trainer_id`, `course_id`, `module_id`, `department_id`, `term_id`) 
                            VALUES 
                            (NULL, '$token', '1', CURRENT_TIMESTAMP, '$date_valid', ' $trainer_id', '$course_id', '$module_id', '$department_id', '$term_id');
                         
                         ";
                        if (mysqli_query($con, $sql)) {
                             echo'
                                <div class="alert alert-success" role="alert">
                                    <a href="#" class="alert-link">Sucessfully Created</a><small>'. $sql .'</small>
                                </div>
                                ';
                        } else {
                             echo'
                                <div class="alert alert-danger" role="alert">
                                   <a href="#" class="alert-link"> '.mysqli_error($con).'</a> <small>'. $sql .'</small>
                                </div>
                                ';
      
                        }
                        
                       
                    }
                ?>
                
            </div>
        </div>



        <div class="row">
           <div class="col-md-12">
             <form class="form-horizontal" method="post">
             <div class="form-group">
                <label for="Token" class="col-sm-2 control-label">Token</label>
                <div class="col-sm-10">
                  <input name="token" type="text" class="form-control" value="<?php echo md5(uniqid(rand(), true)); ?>" id="Token" readonly>
                </div>
             </div>
                 
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Couese</label>
                <div class="col-sm-10">               
                  <select class="form-control" name="course" onchange="showModule(this.value)" required>
                      <option selected disabled>--select course--</option>
                      <?php 
                      
                       $sql = "SELECT * FROM `course`";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                
                               echo '<option value="'.$row['course_id'].'" required>'.$row['course'].' ('.$row['course_id'].')</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
              </div>
                 
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Module</label>
                <div class="col-sm-10">
                  <select class="form-control" id="Module" name="module" required>
                    <option selected>--select course--</option>
                    </select>
                </div>
              </div>
                 
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Trainer </label>
                <div class="col-sm-10">
                  <select class="form-control" name="trainer" required>
                    <option selected>--select trainer--</option>
                      <?php 
                       $sql = "SELECT * FROM `trainer`";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                               echo '<option value="'.$row['trainer_id'].'">'.$row['trainer'].' ('.$row['trainer_id'].')</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
              </div>
                 
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Academic  Year </label>
                <div class="col-sm-10">
                  <select class="form-control" name="academic" required>
                    <?php 
                       $sql = "SELECT * FROM `term` ORDER BY `academic_year` DESC LIMIT 10";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                               echo '<option value="'.$row['term_id'].'">'.$row['academic_year'].' ('.$row['term'].')</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
              </div>
                 
                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Valid Until </label>
                <div class="col-sm-10">
                    <input name="date" type="date" class="form-control date" required>

                </div>
              </div>
             
             
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="surveyRequest">Create</button>
                </div>
              </div>
            </form>
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
