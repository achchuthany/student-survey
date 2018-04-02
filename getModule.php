
<?php
include_once("config.php");
if(isset($_POST['getModule'])){
    $course_id = $_POST['getModule'];
    $sql = "SELECT * FROM `module` WHERE `course_id`='$course_id'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                               echo '<option value="'.$row['module_id'].'">'.$row['module'].' ('.$row['module_id'].')</option>';
                            }
                        }
}

?>