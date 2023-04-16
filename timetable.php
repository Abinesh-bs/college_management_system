

<?php
include('db.php');
$day=date('l');

$result_sql=mysqli_query($con,"SELECT `1`, `2`, `3`, `4`, `5` FROM `timetable` WHERE `day`='$day' ");
while($row = mysqli_fetch_assoc($result_sql))
{
    $p1 = $row['1'];
    $p2 = $row['2'];
    $p3 = $row['3'];
    $p4 = $row['4'];
    $p5 = $row['5'];
    
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboardstyle.css">
    <title>Document</title>
</head>
<body>
    

                <section class="main">
      <div class="main-top">
        <h1>Attendance</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
          <img src="./pic/img1.jpg">
          <h4>Sam David</h4>
          <p>8.30Am - 9.55Am</p>
          <?php echo '<p>'.$p1.'</p>';?>
          </div>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>

            </div>

        </div>
        </body>
</html>
