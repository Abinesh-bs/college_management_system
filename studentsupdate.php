

<?php include('db.php');
?>


<?php 
try{

       //checking form data and empty fields
        if(isset($_POST['done'])){

           
              

//initializing the student id
$sid = $_POST['id'];

//udating students information to database table "students"
$result = mysqli_query($con,"update students set batch ='$_POST[batch]',semester='$_POST[semester]',DOB='$_POST[DOB]',bloodgroup='$_POST[bg]' where rno='$sid'");

$success_msg = 'Updated  successfully';

}

}
catch(Exception $e){

$error_msg =$e->getMessage();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
<title> Update</title>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">

<link rel="stylesheet" type='text/css' href="manage.css">
<link rel="stylesheet" href="finalresultstyle.css">

</head>


<body>
<div class="title">
        <a href="dashboard.php"></a>
        <span class="heading">Update Students Details</span>
    </div>
    <a href="dashboard.php" style="color: black"><span>Logout</span></a>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="addclass.php">Add Class</a>
                    <a href="manageclass.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
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
<center>
        <h3>Update Student Details</h3>
        <!-- Error or Success Message printint started --><p>
    <?php

        if(isset($success_msg))
        {
          echo $success_msg;
        }
        if(isset($error_msg))
        {
          echo $error_msg;
        }

      ?>
        </p><!-- Error or Success Message printint ended -->
 
        <form method="post" action="">
              <label>Registration No. :</label>
                <input type="text" name="sr_id"  class="form-control" id="input1" placeholder="enter your reg. no. to continue" />
              </div>
          </div>
          <input type="submit"  value="Go!" name="sr_btn" />
        </form></center>
        <div class="main">



    <?php

    if(isset($_POST['sr_btn'])){

    //initializing student ID from form data
     $sr_id = $_POST['sr_id'];

     $i=0;

     //searching students information respected to the particular ID
     $all_query = mysqli_query($con,"select * from students where students.rno='$sr_id'");
     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     
     ?>
<form action="" method="post">
 <table>
 <tr>
          <td>Register No.:</td>
          <td><?php echo $data['rno']; ?></td>
        </tr>

        <tr>
            <td>Student's Name:</td>
            <td><?php echo $data['name']; ?></td>
        </tr>

        <tr>
            <td>Department:</td>
            <td><?php echo $data['class_name']; ?></td>
        </tr>

        <tr>
            <td>Batch:</td>
            <td><input type="text" name="batch" value="<?php echo $data['batch']; ?>"></input></td>
        </tr>
        <tr>
            <td>Semester :</td>
            <td><input type="text" name="semester" value="<?php echo $data['semester']; ?>"></input></td>
        </tr>
        <tr>
            <td>Date of Birth :</td>
            <td><input type="text" name="DOB" value="<?php echo $data['DOB']; ?>"></input></td>
        </tr>
        <tr>
            <td>Blood Group :</td>
            <td><input type="text" name="bg" value="<?php echo $data['bloodgroup']; ?>"></input></td>
        </tr>
        
        <input type="hidden" name="id" value="<?php echo $sr_id; ?>">
        
        <tr><td></td></tr>
        <tr>
              <td></td>
              <td><input type="submit"  value="Update" name="done" /></td>
              
        </tr>

       

  </table>
</form>
   <?php 
 } 
   }  
   ?>


    </div>

</div>



</body>

</html>