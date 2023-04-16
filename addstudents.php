<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="finalresultstyle.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
</head>
<body>
    <div class="title">
<span class="heading">Classes And Students</span>
    </div>
<button><a href="classdetails.html">View All</a></button>

    
    <div class="nav">
        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn">Classes
                </a>
                <div class="dropdown-content">
                    <a href="addclass.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Students &nbsp
                </a>
                <div class="dropdown-content">
                    <a href="addstudents.php">Add Students</a>
                    <a href="managestudent.php">Manage Students</a>
                    <a href="studentsupdate.php">Manage Students</a>

                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Student</legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Roll No">
                <?php
                    include('db.php');
                
                    
                    $class_result=mysqli_query($con,"SELECT `name` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <br></br>

                <input type="text" name="batch" placeholder="Batch">
                <input type="text" name="semester" placeholder="Semester">

                <input type="text" name="dob" placeholder="DOB">
                <input type="text" name="bg" placeholder="Blood Group">


                <input type="submit" value="Submit" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['student_name'],$_POST['roll_no'], $_POST['batch'],$_POST['semester'],$_POST['bg'],$_POST['dob'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        $batch=$_POST['batch'];
        $semester=$_POST['semester'];
        $dob=$_POST['dob'];
        $bg=$_POST['bg'];


        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];

        // validation
        if (empty($name) or empty($rno) or empty($class_name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
                if(empty($semester))
                echo '<p class="error">Please select  semester</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
                if(empty($dob))
                echo '<p class="error">Please enter DOB</p>';

                if(empty($bg))
                echo '<p class="error">Please enter Blood Group</p>';
      
                  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`,`batch`,`semester`,`DOB`,`bloodgroup`) VALUES ('$name', '$rno', '$class_name', '$batch','$semester','$dob','$bg')";
        $result=mysqli_query($con,$sql);
       
        if($result) { ?>
            <div style="font-size:20px; color:green;">
                #Inserted Successfully!!
        </div>
         <?php } else{?> 
            <div style="font-size:20px; color:green;">
                #Failed
        </div>
  <?php  }}

?>
