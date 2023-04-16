 <form method="post" action="login.php" class="form-inline">
            <button type="submit" name="log_out" class="btn btn-default btn-sm">

          <span class="glyphicon glyphicon-log-out"></span> Log out</button>
        </form>
      </nav>

      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="http://leblebiakademi.com/wp-content/uploads/2018/08/student-3500990_1920-e1533751134585-300x169.jpg" alt="Card image cap">
        <div class="card-body">

            <?php  
            include('db.php');

            $query = "SELECT * FROM logincheck WHERE username = '$_POST[username]'";

            $results = mysqli_query($qu, $query);

            $count = mysqli_fetch_array($results); ?>

          
            <h5 class="card-title"><?php echo $count['username']; ?></h5>


        </div>
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Information
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $student['email']; ?></li>
                    <li class="list-group-item"><?php echo $student['birthdate']; ?></li>
                    <li class="list-group-item"><?php echo $student['department']; ?></li>
                    <li class="list-group-item"><?php echo $student['scholarship']; echo " | "; echo $student['degree'];?></li>
                    <li class="list-group-item"><?php echo $student['grade']; echo ". grade" ?></li>
                    <li class="list-group-item">
                    <?php
                      $cur_email = $_SESSION['email'];
                      $st_id = $student['student_id'];
                      $query = "SELECT * FROM student_past_courses WHERE student_id = '$st_id'";
                      $results = mysqli_query($db, $query);
                      $total_grade = 0;
                      $total_course = 0;
                      
                      while($row = mysqli_fetch_array($results))
                      {
                        $total_grade = $total_grade + $row['final_grade'];
                        $total_course = $total_course + 1;
                      }

                        $mean = $total_grade/$total_course;
                        echo "GPA: "; echo round($mean/25,3);
                      ?>
                        
                      </li>
                    <li class="list-group-item"><?php echo "Student id: "; echo $student['student_id']; ?></li>
                    <li class="list-group-item"><?php echo "Role: "; echo $student['emp_type']; ?></li>
                    <li class="list-group-item">Advisor:
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <?php echo $student['advisor_name'];  ?>
                        </button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>