<div class="search">
            <form action="students.php" method="get">
                <fieldset>
                    <legend class="heading">For Students</legend>

                    <?php
                        include('db.php');

                        $class_result=mysqli_query($con,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <input type="text" name="rn" placeholder="Roll No">
                    <input type="submit" value="Get Result">