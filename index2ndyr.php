<?php
include("db.php");
include("attendence.php");
$flag=0;
$update=0;
 if(isset($_POST['submit']))
 {
    $date=date("y-m-d");
    $records =mysqli_query($con,"select * from attendence_record where date ='$date'");
    $num=mysqli_num_rows($records);
    if($num){
        foreach($_POST['attendence_status'] as $id=> $attendence_status)
        {
            $student_name=$_POST['student_name'][$id];
            $register_number=$_POST['register_number'][$id];
            $department=$_POST['department'][$id];
        $result=  mysqli_query($con,"update attendence_record set attendence_status='$attendence_status',date='$date' where date ='$date'");
}if($result){
    $update=1;
}
}
    else
    {
foreach($_POST['attendence_status'] as $id=> $attendence_status)
{
    $student_name=$_POST['name'][$id];
    $register_number=$_POST['rno'][$id];
    $department=$_POST['class_name'][$id];

$result=mysqli_query($con, "insert into attendence_record (	student_name,	register_number,	department,	attendence_status,date) values ('$student_name',	'$register_number',	'$department',	'$attendence_status','$date')");



if($result){
            $flag=1;
        }
}       
}
}


?>
        <form action="index2ndyr.php" method="post">

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-info pull-right" href="2ndshowattendence.php">View All</a>
        </h2>
       <div class="well  text-center">Date : <?php echo date("d-m-Y");?></div>
       <?php if($flag) { ?>
            <div class="alert alert-success">
                Attendance Data Inserted Successfully!!
        </div>
         <?php } ?>
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
        <div class="panel panel-body">
            <form action="index2ndyr.php" method="Post">
                <table class="table table-striped">
                    <tr>
                        
                        <th>Student name</th>
                        <th>Register number</th>
                       <th> Department</th>
                        <th>Attendence Status</th>
                </tr>
                   <?php  
                       if(isset($_POST['sr_btn'])){

                        if(!isset($_POST['whichcourse'])){
                           $course=null;
               }
                       else{
                           $course=$_POST['whichcourse'];
                     
                       }
                       }
                       if (empty($course)) {
                           echo '<p class="error">Please select your class</p>';
                           exit();
                       }
                    

                   $result = mysqli_query($con, "select * from students  where rno like '21%' and class_name='$course' order by name asc");
                    
                     
                    $rno = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $rno++;

                        ?>
                        <tr>
                            <td>
                                <?php echo $row['name']; ?>
                                <input type="hidden" value="<?php echo $row['name']; ?>" name="name[]">
                            </td>
                            <td>
                                <?php echo $row['rno']; ?> 
                            <input type="hidden" value="<?php echo $row['rno']; ?>" name="rno[]">
                            </td>
                            <td>
                                <?php echo $row['class_name']; ?>
                                <input type="hidden" value="<?php echo $row['class_name']; ?>" name="class_name[]">
                            </td>
                            <td>
                                <input type="radio" name="attendence_status[<?php echo $counter;?>]" value="Present"
                                <?php if(isset($_POST['attendence_status'][$counter]) && $_POST['attendence_status'][$counter]=="Present") {
                                    echo "checked=checked";
                                }
                                    ?> required> Present
                                <input type="radio" name="attendence_status[<?php echo $counter; ?>]" value="Absent" 
                                <?php if(isset($_POST['attendence_status'][$counter]) && $_POST['attendence_status'][$counter]=="Absent") {
                                    echo "checked=checked";
                                }
                                    ?> required >Absent
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                </table>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>

        </div>

    </div>
</div>