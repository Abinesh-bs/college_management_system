<?php

include("db.php");
include("attendence.php");


?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
                <table class="table table-striped">
                    <tr>
                        <th>Student name</th>
                        <th>Register number</th>
                        <th>Department</th>
                        <th>Attendance Status</th>
                        <th>Date</th>
                    </tr>
              <?php $result = mysqli_query($con, "select student_name ,attendence_staus,date from attendence_record where register_number='20SUCG01'");
                    
                    $date = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $date++;

                        ?>
                        <tr>
                            <td><?php echo $date; ?> </td>
                            
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                </table>
            </form>

        </div>

    </div>
</div>