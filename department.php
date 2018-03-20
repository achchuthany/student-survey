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
                <div class="page-header">
                    <h3>ACADEMIC DEPARTMENTS                    </h3>
                </div>
            </div>
        </div>
 <div class="row">
            <div class="col-md-12">        
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ADD-DEPARTMENT">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" data-toggle="modal" data-target="#ADD-DEPARTMENT"></span> Add Department
                </button>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department</th>                          
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Department</th>                          
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                        $sql = "SELECT * FROM `department`";
                        $now = date("Y-m-d H:i:s");
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                               
                                echo '<tr>';
                                echo '
                                    <td>'. $row["department_id"].'</td>
                                    <td>'. $row["department"].'</td>
                                   
                                    <td>
                                    <a href="course?id='.$row["department_id"].'"><button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> List of Courses </button></a>
                                    
                                    
                                    <a href="?id='.$row["department_id"].'"><button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button></a>
                                    
                                    <a href="?id='.$row["department_id"].'"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button></a>
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

<!-- Modal -->
<div class="modal fade" id="ADD-DEPARTMENT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
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
