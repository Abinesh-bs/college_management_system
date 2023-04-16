<?php

include("db.php");
include("attendence.php");


?>
<form action="" method="post">

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            
            <a class="btn btn-success" href="add.php">Add Students</a>
            <a class="btn btn-info pull-right" href="viewall1st.php">Back</a>
        </h2>
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
<label  class="control-label">Select Date : </label>

                 <?php
$class_result=mysqli_query($con,"SELECT distinct `date` FROM `attendence_record`");
                echo '<select name="date">';
                echo '<option selected disabled>Select Class</option>';
                while($row = mysqli_fetch_array($class_result)){
                    $display=$row['date'];
                    echo '<option value="'.$display.'">'.$display.'</option>';
                }
                echo'</select>'
                ?>
<input type="submit" class="btn btn-primary" value="Go!" name="sr_btn" >*
            </form>
        <div class="panel panel-body">
            <form action="index1st.php" method="Post">
                <table class="table table-striped">
                    <tr>
                        <th>Serial number</th>
                        <th>Student name</th>
                        <th>Register number</th>
                        <th>Department</th>
                        <th>Attendance Status</th>
                    </tr>

                    <?php 
                     $course=null;
                    $date=null;
                    if(isset($_POST['sr_btn'])){

                     if(!isset($_POST['whichcourse']) and !isset($_POST['date'])){
                        $course=null;
                        $date=null;
            }
                    else{
                 $course=$_POST['whichcourse'];
                  $date=$_POST['date'];
                    }
                    }
                    if (empty($course) or empty($date)) {
                        if(empty($course)){
                            echo '<p class="error">Please select your class</p>';
                        }
                        if(empty($date)){
                            echo '<p class="error">Please enter your roll number</p>';
                        }
                        exit();
                    }
                           
                    
                    
                    $result = mysqli_query($con, "select * from attendence_record where date='$date'and register_number like '22%' and department='$course'");
                    $registernumber = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $registernumber++;

                        ?>
                        <tr>
                            <td><?php echo $registernumber; ?> </td>
                            <td>
                                <?php echo $row['student_name']; ?>
                            </td>
                            <td>
                           <p name="rno" ><?php echo $row['register_number']; ?>
                        
                            </td>
                            <td>
                                <?php echo $row['department']; ?></p>
                            </td>
                            <td>
                                <input type="radio" name="attendence_status[<?php echo $counter;?>]"
                                <?php if ($row['attendence_status'] == "Present")
                                echo "checked=checked";
                                ?>
                                value="Present">Present
                                <input type="radio" name="attendence_status[<?php echo $counter; ?>]"
                                <?php if ($row['attendence_status'] == "Absent")
                                echo "checked=checked";
                                ?>
                                value="Absent">Absent
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                </table>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>

        </div>

    </div>
</div>