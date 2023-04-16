<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="finalresultstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Update Timetable</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Timetable</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Timetable
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="addtimetable.php">Add Timetable</a>
                    <a href="managetimetable.php">Manage Timetable</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Timetable</legend>
                <?php
                    include('db.php');
                    
                    $class_result=mysqli_query($con,"SELECT distinct `Day` FROM `timetable`");
                        echo '<select name="Day">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['Day'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <?php
                    include('db.php');
                    
                    $class_result=mysqli_query($con,"SELECT distinct `department` FROM `timetable`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['department'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                    ?>
                    <?php
                    include('db.php');
                    
                    $class_result=mysqli_query($con,"SELECT distinct `semester` FROM `timetable`");
                        echo '<select name="semester">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['semester'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>
                
                <?php
                    $class_result=mysqli_query($con,"SELECT distinct `Day` FROM `timetable`");
                        echo '<select name="day">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['Day'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <?php
                $class_result=mysqli_query($con,"SELECT distinct `department` FROM `timetable`");
                    echo '<select name="dept">';
                    echo '<option selected disabled>Select Class</option>';
                while($row = mysqli_fetch_array($class_result)){
                    $display=$row['department'];
                    echo '<option value="'.$display.'">'.$display.'</option>';
                }
                echo'</select>'
            ?>
                <input type="text" name="p1" id="" placeholder="Paper 1">
                <input type="text" name="p2" id="" placeholder="Paper 2">
                <input type="text" name="p3" id="" placeholder="Paper 3">
                <input type="text" name="p4" id="" placeholder="Paper 4">
                <input type="text" name="p5" id="" placeholder="Paper 5">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>
    
</body>
</html>

<?php
    if(isset($_POST['Day'],$_POST['class_name'],$_POST['semester'])) {
        $day=$_POST['Day'];
        $dept=$_POST['class_name'];
        $sem=$_POST['semester'];
        $delete_sql=mysqli_query($con,"DELETE from `timetable` where `Day` ='$day' and `department`='$dept' and `semester`='$sem'");
        ?>
        <div class="well  text-center"></div>
        <?php if($delete_sql) { ?>
             <div class="alert alert-success">
                Deleted Successfully!!
         </div>
         <?php
        }
    }

    if(isset($_POST['day'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['dept'])) {
        $day=$_POST['day'];
        $dept=$_POST['dept'];
        $p1=$_POST['p1'];
        $p2=$_POST['p2'];
        $p3=$_POST['p3'];
        $p4=$_POST['p4'];
        $p5=$_POST['p5'];
        $sql="UPDATE `timetable` SET `Day`='$day',`1`='$p1',`2`='$p2',`3`='$p3',`4`='$p4',`5`='$p5' ,`department`='$dept' WHERE `Day`='$day' and `department`='$dept'";
        $update_sql=mysqli_query($con,$sql);
?>
        <div class="well  text-center"></div>
        <?php if($update_sql) { ?>
             <div class="alert alert-success">
                Updated Successfully!!
         </div>
      <?php  }
    }
?>
 