
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboardstyle.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<form action="demostudents.php" method="post">
<body>
<?php
$rn = $_POST['rn'];
$password = $_POST['password'];

if(!empty($rn)||!empty($password)){
	$host = "localhost";
	$dbusername = "root";
	$dbpassword ="";
	$dbname = "logincheck";

	$conn  = new mysqli ($host,$dbusername,$dbpassword,$dbname);

	if(mysqli_connect_error()){
		die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
	}
	else{
		$query = "SELECT * from students_login where rno='$rn' and password='$password'";
		$result = mysqli_query($conn,$query);

		$count=mysqli_num_rows($result);
		if($count>0){
	
			header("Location:studentsdashboard.php");

		}
		else{
			echo '<script>';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
		}
	}
}
?>
<?php
        include("db.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }
        ?>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <i class="fa fa-user-alt" style="font-size: 50px;"></i>
          <span class="nav-item">Staff</span>
        </a></li>
        <li><a href="addclass.php">
          <i class="fas fa-chalkboard-teacher"></i>
          <span class="nav-item">Classes & Students </span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Message</span>
        </a></li>
        <li><a href="addresult.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">Result</span>
        </a></li>
        <li><a href="studentsattendance.php">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">Attendance</span>
        </a></li>
        <li><a href="syllabus.php">
          <i class="fas fa-book"></i>
          <span class="nav-item">Syllabus</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li>
 

        <li><a href="logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>



</body>
</form>
</html>
    
  

  
