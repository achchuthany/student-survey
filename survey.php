<?php
              
$catA1 = $catA2 = $catA3 = $catA4 = $catA5 = $catA6 = $catA7 = $catA8 = $catA9 = NULL;

$catB1 = $catB2 = $catB3 = $catB4 = $catB5 = $catB6 = $catB7 = $catB8 = $catB9 = NULL;

$catC1 = $catC2 = $catC3 = NULL;
        
if(!empty($_POST["catA1"]) && !empty($_POST["catA2"]) && !empty($_POST["catA3"]) && !empty($_POST["catA4"]) && !empty($_POST["catA5"]) && !empty($_POST["catA6"]) && !empty($_POST["catA7"]) && !empty($_POST["catA8"]) && !empty($_POST["catA9"]) && !empty($_POST["catB1"]) && !empty($_POST["catB2"]) && !empty($_POST["catB3"]) && !empty($_POST["catB4"]) && !empty($_POST["catB5"]) && !empty($_POST["catB6"]) && !empty($_POST["catB7"]) && !empty($_POST["catB8"]) && !empty($_POST["catB9"])){   
    
    $catA1 = $_POST["catA1"];
    $catA2 = $_POST["catA2"]; 
    $catA3 = $_POST["catA3"];
    $catA4 = $_POST["catA4"];
    $catA5 = $_POST["catA5"]; 
    $catA6 = $_POST["catA6"]; 
    $catA7 = $_POST["catA7"];
    $catA8 = $_POST["catA8"]; 
    $catA9 = $_POST["catA9"]; 
    $catB1 = $_POST["catB1"];
    $catB2 = $_POST["catB2"];
    $catB3 = $_POST["catB3"]; 
    $catB4 = $_POST["catB4"]; 
    $catB5 = $_POST["catB5"]; 
    $catB6 = $_POST["catB6"];
    $catB7 = $_POST["catB7"]; 
    $catB8 = $_POST["catB8"]; 
    $catB9 = $_POST["catB9"];
    
    if(!empty($_POST["catC1"])){$catC1 = $_POST["catC1"];}
    if(!empty($_POST["catC2"])){$catC2 = $_POST["catC2"];}
    if(!empty($_POST["catC3"])){$catC3 = $_POST["catC3"];}
    
    $sql = "INSERT INTO `surveyrecords` (`course_id`, `module_id`, `department_id`, `term_id`, `trainer_id`, `catA1`, `catA2`, `catA3`, `catA4`, `catA5`, `catA6`, `catA7`, `catA8`, `catA9`, `catB1`, `catB2`, `catB3`, `catB4`, `catB5`, `catB6`, `catB7`, `catB8`, `catB9`, `catC1`, `catC2`, `catC3`,`token`) VALUES ('$course_id', '$module_id', '$department_id', '$term_id', '$trainer_id', '$catA1', '$catA2', '$catA3', '$catA4', '$catA5', '$catA6', '$catA7', '$catA8', '$catA9', '$catB1', '$catB2', '$catB3', '$catB4', '$catB5', '$catB6', '$catB7', '$catB8', '$catB9', '$catC1', '$catC2', '$catC3','$token');";

    if (mysqli_query($con, $sql)) {
    echo '<div class="alert alert-success" role="alert">
    <h1>Thank you for filling in the form.</h1> 
    <h3>'.$module.' Survey Record</h3>
    </div>';
    } else {
    echo '<div class="alert alert-danger" role="alert"> Error: ' . $sql . '<br>' . mysqli_error($con).'</div>';
    }
    
    
    
    
    
}
?>
