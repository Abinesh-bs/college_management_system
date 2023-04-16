<?php
include("db.php");
include("attendence.php");
?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Students</a>
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
        <div class="panel panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Serial number</th>
                        <th>Date</th>
                        <th>Show_Attendance</th>
                    </tr>

                    <?php $result = mysqli_query($con, "select distinct date from attendence_record");
                    $registernumber = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $registernumber++;

                        ?>
                        <tr>
                            <td><?php echo $registernumber; ?> </td>
                            <td><?php echo $row['date'];?></td>
                            <td>
                            <form action="showattendence3rd.php" method="POST">
                                <input type="hidden" value="<?php echo $row ['date']?>" name="date">
                                <input type="submit" value="Show Attendance" class="btn btn-primary">
                            </td>
                        
                           
                        </tr>
                        <?php
            
                    }
                    ?>
                </table>
            </form>

        </div>

    </div>
</div>
?>