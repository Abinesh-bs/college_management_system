

<?php include('db.php');
include('attendence.php')
?>


<?php 
try{

       //checking form data and empty fields
        if(isset($_POST['done'])){

        if (empty($_POST['name'])) {
          throw new Exception("Name cannot be empty");
          
        }
            if (empty($_POST['id'])) {
             
              throw new Exception("Department cannot be empty");
              
            }
              

//initializing the student id
$sid = $_POST['id'];

//udating students information to database table "students"
$result = mysqli_query($con,"update class set name='$_POST[name]',id='$sid' where id='$sid'");
$success_msg = 'Updated  successfully';

}

}
catch(Exception $e){

$error_msg =$e->getMessage();
}


?>



<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>
<title> Upadte Class Details</title>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="../css/main.css">

 
<link rel="stylesheet" href="styles.css" >
 

</head>
<!-- head ended -->


<!-- body started -->
<body>

<!-- Menus started-->
<header>



</div>

</header>
<!-- Menus ended -->

<!-- Content, Tables, Forms, Texts, Images started -->
<center>

<div class="row">
  <div class="content">

        <h3>Update Student Details</h3>
        <br>
        
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

        <br>
 
        <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
          <div class="form-group">
              <label for="input1" class="col-sm-3 control-label">Registration No.</label>
              <div class="col-sm-7">
                <input type="text" name="sr_id"  class="form-control" id="input1" placeholder="enter your reg. no. to continue" />
              </div>
          </div>
          <input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Go!" name="sr_btn" />
        </form>
        <div class="content"></div>


    <?php

    if(isset($_POST['sr_btn'])){

    //initializing student ID from form data
     $sr_id = $_POST['sr_id'];

     $i=0;

     //searching students information respected to the particular ID
     $all_query = mysqli_query($con,"select * from class where class.id='$sr_id'");
     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     
     ?>
<form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
 <table class="table table-striped">

        <tr>
          <td>Class ID.:</td>
          <td><?php echo $data['id']; ?></td>
        </tr>

        <tr>
            <td>Class Name:</td>
            <td><input type="text" name="name" value="<?php echo $data['name']; ?>"></input></td>
        </tr>
        
        <input type="hidden" name="id" value="<?php echo $sr_id; ?>">
        
        <tr><td></td></tr>
        <tr>
              <td></td>
              <td><input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Update" name="done" /></td>
              
        </tr>

  </table>
</form>
   <?php 
 } 
   }  
   ?>


    </div>

</div>

</center>
<!-- Contents, Tables, Forms, Images ended -->

</body>
<!-- Menus ended -->

</html>