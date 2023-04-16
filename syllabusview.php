<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus view</title>
</head>
<body>
    <form action="" method="post">
<h1 style="text-align:center; color:rgb(97, 208, 252); font-weight: bold; font-family:'Times New Roman', Times, serif;">Thiagaraja College of Arts And Science</h1>

<h3 style="text-align:center; color:rgb(117, 216, 255);font-weight: bolder; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Syllabus-2023</h3>
    
<div class="panel panel-default">
    <div class="panel panel-heading">
        <div class="panel panel-body">


        <a class="btn btn-info pull-right" href="syllabus.php">Back</a>
        

        <label  class="control-label">Select Department : </label>

<?php
include('db.php');
$class_result=mysqli_query($con,"SELECT `name` FROM `class`");
                echo '<select name="whichcourse">';
                echo '<option selected disabled>Select Class</option>';
                while($row = mysqli_fetch_array($class_result)){
                    $display=$row['name'];
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
            
            

                <table class="table table-stripped">
                    <tr>
                        <th>Code NO</th>
                        <th>Title of the Paper</th>

                        <th>Course</th>
                        <th>CIA</th>
                        <th>SE</th>
                        <th>Total</th>
</tr>

                    <?php 
                    include("db.php");
$dept=null;
$sem=null;
                     if(isset($_POST['sr_btn'])){

                        if(!isset($_POST['whichcourse']) or !isset($_POST['semester'])){
                           $dept=null;
                           $sem=null;
               }
                       else{
                    $dept=$_POST['whichcourse'];
                     $sem=$_POST['semester'];
                       }
                    }
                       if (empty($dept) or empty($sem)) {
                           if(empty($dept)){
                               echo '<p class="error">Please select your class</p>';
                           }
                           if(empty($sem)){
                               echo '<p class="error">Please select your semester</p>';
                           }
                           exit();
                       }
                     $result= mysqli_query($con,"select * from syllabus where department='$dept' and semester='$sem'");
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                <td>
                                <?php echo $row['courseno']; ?>
                            </td>
                            <td>
                                <?php echo $row['coursetitle']; ?>
                            </td>
                            <td>
                                <?php echo $row['titleofthepaper']; ?>
                            </td>
                            <td>
                                <?php echo $row['cia']; ?>
                    </td>
                    <td>
                                <?php echo $row['se']; ?>
                    </td>
                    <td>
                                <?php echo $row['total']; ?>
                    </td>

                    </tr>
            
                            
                    <?php
                    }
                    
        ?>
    </table>
    </form>
    </form>

</div>
                </div>
</body>
</html>