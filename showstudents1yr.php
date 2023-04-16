<?php 
include('db.php');
include('attendence.php');
?>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">

    <h1 style="text-align:center;">Students Details Of First Year</h1>
    <label  class="control-label">Select Department : </label>

<?php
$class_result=mysqli_query($con,"SELECT `name` FROM `class`");
               echo '<select name="whichcourse">';
              echo '<option selected disabled>Select Class</option>';
               while($row = mysqli_fetch_array($class_result)){
                   $display=$row['name'];
                   echo '<option value="'.$display.'">'.$display.'</option>';
               }
               echo'</select>'
               ?>
               <input type="submit" class="btn btn-primary" value="Search!" name="sr_btn">
           </form>
<table class="table table-bordered table-striped">
                    <tr>
                        <th>S.no</th>
                        <th>Student name</th>
                        <th>Register number</th>
                        <th>Department</th>
                        <th>Semester</th>

                    </tr>

                    <?php $course=null;
                    if(isset($_POST['sr_btn'])){

                     if(!isset($_POST['whichcourse'])){
                        $course=null;
            }
                    else{
                        $course=$_POST['whichcourse'];
                  
                    }
                    }


                    
                    $result = mysqli_query($con, "select * from students where rno like '22%' and class_name='$course'");
                    $registernumber = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {


                         $registernumber++;

?>
<tr>
    <td><?php echo $registernumber; ?> </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['rno']; ?>
                            </td>
                            <td>
                                <?php echo $row['class_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['semester']; ?>
                            </td>
                        
            <?php
                    }?>
                    </body>
                    </html>