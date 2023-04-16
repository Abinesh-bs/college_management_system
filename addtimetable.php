
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="finalresultstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Timetable</title>
</head>
<body>
        
    <div class="title">
        <span class="heading">Students Timetable</span>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn">Timetable
</a>

       <div class="dropdown-content">
                    <a href="addtimetable.php">Add TimeTable</a>
                    <a href="managetimetable.php">Manage Timetable</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset style="color:red;">
            <legend>Enter Timetable</legend>
            <?php
                    include("db.php");
               $select_class_query="SELECT `name` from `class`";
                    $class_result=mysqli_query($con,$select_class_query);
                    //select class
                    echo '<select name="class_name">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>
                <input type="text" name="sem" id="" placeholder="Semester">

                <input type="text" name="day" placeholder="Day">
                <input type="text" name="p1" id="" placeholder="1st Period">
                <input type="text" name="p2" id="" placeholder="2nd Period">
                <input type="text" name="p3" id="" placeholder="3rd Period">
                <input type="text" name="p4" id="" placeholder="4th Period">
                <input type="text" name="p5" id="" placeholder="5th Period">

                <br></br>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
include('db.php');
    if(isset($_POST['day'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
    {
        if(!isset($_POST['class_name']))
        $class_name=null;
    else
        $class_name=$_POST['class_name'];
        $day=$_POST['day'];
        $p1=$_POST['p1'];
        $p2=$_POST['p2'];
        $p3=$_POST['p3'];
        $p4=$_POST['p4'];
        $p5=$_POST['p5'];
        $sem=$_POST['sem'];


        // validation
       /* if (empty($class_name) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Please enter valid marks</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }*/


        $result="INSERT INTO `timetable` (`Day`, `1`, `2`, `3`, `4`, `5`,`department`,`semester`) VALUES ( '$day','$p1', '$p2', '$p3', '$p4', '$p5','$class_name','$sem')";
        $sql=mysqli_query($con,$result);
        if($sql){
            $flag=1;
        }
?>
        <div class="well  text-center"></div>
        <?php if($flag) { ?>
             <div class="alert alert-success">
                Data Inserted Successfully!!
         </div>
  <?php 
  }  }
?>