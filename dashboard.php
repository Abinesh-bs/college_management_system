<?php
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
}
;

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:loginphp.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboardstyle.css" />
  <link rel="stylesheet" href="profilestyle.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<form action="loginphp.php" method="post">

  <body>
  <div class="container">
    
  

        <div class="profile">
        <center>


          <label>Staff Details </label>


          <h2>


            <?php
            include('db.php');

            $select = mysqli_query($con, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
              $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image'] == '') {
              echo '<img src="images/default-avatar.png">';
            } else {
              echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            ?>
          <table>
            <tr>
              <td>Name : </td>
              <td>
                <?php echo $fetch['name']; ?>
              </td>
            </tr>

            <tr>
              <td>Department:</td>
              <td>
                <?php echo $fetch['department'] ?>
              </td>
            </tr>

            <tr>
              <td>Email: </td>
              <td>
                <?php echo $fetch['email'] ?>
              </td>
            </tr>


          </table>


          </h2>
        </center>

        </div>
      </div>
  
      <nav>

        <ul>
          <li><a href="#" class="logo">
              <i class="fa fa-user-alt" style="font-size: 50px;"></i>
              <span class="nav-item">
                <?php echo $fetch['name']; ?>

              </span>
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
          <li><a href="Attendancehomepage.html">
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