<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="finalresultstyle.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Add Class</title>
</head>

<body>

    <div class="title">

        <span class="heading">Classes And Students</span>
    </div>


    <div class="nav">

        <ul>
            <li class="dropdown">
                <a href="" class="dropbtn">Classes
                </a>
                <div class="dropdown-content">
                    <a href="addclass.php">Add Class</a>
                    <a href="manageclass.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Students
                </a>
                <div class="dropdown-content">
                    <a href="addstudents.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                    <a href="studentsupdate.php">Update Students</a>

                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">

            <fieldset>
                <legend>Add Class</legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
                <input type="submit" value="Submit" class="btn btn-success;">
            </fieldset>
        </form>
    </div>
</body>

</html>

<?php
include('db.php');

if (isset($_POST['class_name'], $_POST['class_id'])) {
    $name = $_POST["class_name"];
    $id = $_POST["class_id"];

    // validation
    if (empty($name) or empty($id)) {
        if (empty($name))
            echo '<p class="error">Please enter class</p>';
        if (empty($id))
            echo '<p class="error">Please enter class id</p>';
        exit();
    }

    $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
    $result = mysqli_query($con, $sql);

    if ($result) { ?>
        <div>
            Inserted Successfully!!
        </div>
    <?php } ?>
<?php }

?>