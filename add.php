<?php

include("attendence.php");
include("db.php");
$flag=0;

    if(isset($_POST['name'],$_POST['register'])) {
        $name=$_POST['name'];
        $rno=$_POST['register'];
        if(!isset($_POST['department']))
            $class_name=null;
        else
            $class_name=$_POST['department'];
$date = date("Y-m-d");
$sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($con,$sql);
        

        // validation
        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($class_name))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        
}
        
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }

    }


?>
<div class="panel panel-default">
    
        <div class="alert alert-success">
        <?php if($flag) { ?>
            <strong>!success</strong>Students Data inserted Sucessfully;
        </div>
        <?php } ?>

    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Students</a>

            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
    </div>

    <div class="panel-body">
        <form action="add.php" method="post">
            <div class="form-group">
                <label for="name">Students name </label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Register Number</label>
                <input type="text" name="register" id="register" class="form-control" required>
            </div>
            <?php
                    include('db.php');
                    
                    $class_result=mysqli_query($con,"SELECT `name` FROM `class`");
                        echo '<select name="department" class="form-control">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
<br></br>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" required>
            </div>
        </div>