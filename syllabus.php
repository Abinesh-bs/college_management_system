<?php
include('db.php');
if(isset($_POST['courseno'],$_POST['coursetitle'],$_POST['category'],$_POST['L'],$_POST['T'],$_POST['P'],$_POST['department'],$_POST['semester']))
{
    $courseno=$_POST['courseno'];
    $coursetitle=$_POST['coursetitle'];
    $category=$_POST['category'];
    $L=$_POST['L'];
    $T=$_POST['T'];
    $P=$_POST['P'];
    $dept=$_POST['department'];
    $sem=$_POST['semester'];

    $sql = "insert into syllabus (courseno, coursetitle, titleofthepaper,cia,se,total,department,semester) VALUES ('$courseno', '$coursetitle', '$category','$L','$T','$P','$dept','$sem')";
    
    $sql=mysqli_query($con,$sql);
        
        if (!$sql) {
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

<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus</title>
   
</head>

<body>
<h1 style="text-align:center; color:rgb(97, 208, 252); font-weight: bold; font-family:'Times New Roman', Times, serif;">Thiagaraja College of Arts And Science</h1>
<h2 style="text-align:center; color:rgb(117, 216, 255);font-weight: bolder; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Department Of Computer Science</h2>

    <h3 style="text-align:center; color:rgb(117, 216, 255);font-weight: bolder; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Syllabus-2023</h3>
   <h2> <a class="btn btn-primary" href="updatesyllabus.php">Update Syllabus</a>
        <a class="btn btn-success pull-right" href="syllabusview.php">View Syllabus</a></h2>
    <br></br>
    
    <table class="table table-striped table-bordered">
        <tr>
            <th>Department</th>
            <th>Semester</th>
            <th>Course No</th>
            <th>Course Title</th>
            <th>Title of the Paper</th>
            <th>CIA</th>
            <th>SE</th>
            <th>Total</th>
        </tr>
    <form action="" method="post">

<tr>
  <th>  <?php
    include('db.php');
      $class_result=mysqli_query($con,"SELECT `name` FROM `class`");
                        echo '<select name="department">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'?></th>
                    <th>  <?php
    include('db.php');
      $class_result=mysqli_query($con,"SELECT  distinct `semester` FROM `students`");
                        echo '<select name="semester">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['semester'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'?></th>
<th><input type ="text" name="courseno" placeholder="Course ID"></th>
<th><input type ="text" name="coursetitle" placeholder="Course Title"></th>
<th><input type ="text" name="category" placeholder="Category"></th>
<th><input type ="text" name="L" placeholder="Internal"></th>
<th><input type ="text" name="T" placeholder="External"></th>
<th><input type ="text" name="P" placeholder="Total Mark"></th>

</tr>

    </table>
<input type="submit" value="Submit" class="btn btn-primary">

</form>
</body>

</html>