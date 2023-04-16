<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type='text/css' href="finalresultstyle.css">
    <link rel="stylesheet" href="manage.css">
    <title>Dashboard</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Manage Class</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn">Classes
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="addclass.php">Add Class</a>
                    <a href="manageclass.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="addstudents.php">Add Students</a>
                    <a href="managestudent.php">Manage Students</a>
                    <a href="studentsupdate.php">Update Students</a>

                </div>
            </li>
        </ul>
    </div>
    
    <div class="main">
        <?php
            include('db.php');

            $sql = "SELECT `name`, `id` FROM `class`";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <tr>
                <th>ID</th>
                <th>NAME</th>
                </tr>";

                while($row = mysqli_fetch_array($result))

                  {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
    
                  echo "</tr>";

                  }

                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Class</legend>
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
                <input type="text" name="id" placeholder="Classid">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>
       <!-- <form action="" method="post">
            <fieldset>
                <legend>Update </legend>
                <input type="text" name="class"  placeholder="class_name">
                

                <input type="text" name="id"  placeholder="Class ID">
                <input type="submit" value="update">
                </fieldset>
        </form>!-->
    </div>
    </div>

</body>
</html>
<?php
    if(isset($_POST['class_name'],$_POST['id'])) {
        $class_name=$_POST['class_name'];
        $id=$_POST['id'];
        echo $class_name;
        echo $id;
        $delete_sql=mysqli_query($con,"DELETE from `class` where `id`='$id' and `name`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['class'],$_POST['id'])){
        $class_name=$_POST['class'];
        $id=$_POST['id'];


        

        $sql="UPDATE 'class' SET 'name'='$class_name','id'='$id' where 1";
        $update_sql=mysqli_query($con,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>