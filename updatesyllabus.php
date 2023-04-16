

<?php include('db.php');
include('attendence.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
<title>Syllabus Update</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="tablestyle.css" >

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<form method="post" action="">
<div class="panel panel-heading">

<h1 style="text-align:center; color:rgb(97, 208, 252); font-weight: bold; font-family:'Times New Roman', Times, serif;">Thiagaraja College of Arts And Science</h1>
<h3 style="text-align:center; color:rgb(117, 216, 255);font-weight: bolder; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Update Syllabus</h3>
<div class="panel panel-default">
    <div class="panel panel-body">

    
 <label  class="control-label">Select Department : </label>

<?php
include('db.php');
$class_result=mysqli_query($con,"SELECT `courseno` FROM `syllabus`");
                echo '<select name="whichcourse">';
                echo '<option selected disabled>Select Class</option>';
                while($row = mysqli_fetch_array($class_result)){
                    $display=$row['courseno'];
                    echo '<option value="'.$display.'">'.$display.'</option>';
                }
                echo'</select>'
                ?>
<label  class="control-label">Select Semester : </label>

                 <?php
$class_result=mysqli_query($con,"SELECT distinct `semester` FROM `students`");
                echo '<select name="semester">';
                echo '<option selected disabled>Select Class</option>';
                while($row = mysqli_fetch_array($class_result)){
                    $display=$row['semester'];
                    echo '<option value="'.$display.'">'.$display.'</option>';
                }
                echo'</select>'
?>
       
<input type="submit" class="btn btn-primary" value="Go!" name="sr_btn" >
</form></div>
</div>
    
<?php
try{
           //checking form data and empty fields
            if(isset($_POST['done'])){
                  
       //udating students information to database table "students"
       $update = mysqli_query($con,"update syllabus set coursetitle='$_POST[coursetitle]',titleofthepaper='$_POST[top]',cia='$_POST[cia]',se='$_POST[se]',total='$_POST[total]' where courseno='$_POST[cno]'");
       $success_msg = 'Updated  successfully';
       
       }
    }
    catch(Exception $e){

        $error_msg =$e->getMessage();
    }     
    ?>
    <p>
    <?php

        if(isset($success_msg))
        {
          echo $success_msg;
        }
        if(isset($error_msg))
        {
          echo $error_msg;
        }

      ?></p>
    <?php 
    if(isset($_POST['sr_btn'])){
       $i=0;


        if(!isset($_POST['whichcourse']) and !isset($_POST['semester'])){
           $cno=null;
           $sem=null;
}
       else{
    $cno=$_POST['whichcourse'];
     $sem=$_POST['semester'];
       }
    }   
       if (empty($cno) or empty($sem)) {
           if(empty($cno)){
               echo '<p class="error">Please select your class</p>';
           }
           if(empty($sem)){
               echo '<p class="error">Please select your semester</p>';
           }
           exit();

       }
       
     $result= mysqli_query($con,"select * from syllabus where courseno='$cno' and semester='$sem'");
     while ($data = mysqli_fetch_array($result)) {
        $i++;
        ?>
<form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
        <div class="main">
                <table class="table table-striped table-bordered">
        
        <tr>

            
            <input type="hidden" name="cno" value="<?php echo $data['courseno']; ?>"></input>
        </tr>
        <tr>
        <th>Course Title</th>
            
            <td><input type="text" name="coursetitle" value="<?php echo $data['coursetitle']; ?>"></input></td>
        </tr>
        <tr>
        <th>Title of the Paper</th>
            
            <td><input type="text" name="top" value="<?php echo $data['titleofthepaper']; ?>"></input></td>
        </tr>
        <tr>
        <th>CIA</th>
        
            
            <td><input type="text" name="cia" value="<?php echo $data['cia']; ?>"></input></td>
        </tr>
        <tr>
        <th>SE</th>
        
            <td><input type="text" name="se" value="<?php echo $data['se']; ?>"></input></td>
        </tr>
        <tr>
        <th>Total</th>
            
            <td><input type="text" name="total" value="<?php echo $data['total']; ?>"></input></td>
        </tr>
        
        <tr>
              <td></td>
        
        <td><input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Update" name="done" /></td>
        </tr>
        

     </form>
    <?php
    }

    
?>
</table>
</form>


</div>
