<?php include ('head.php');?>
<body >

    <?php include ('navigation-bar1.php');?>

        <div id="wrapper">
            <div id="page-wrapper">
                
                <div class="chart-content1">
                    <div class="chart-content2">
                        <h2 style="text-align:center; font-size:20px;">Chart Viewing</h2>
                        <ul>
                          <li><a href="../candidatecharts/live_result.php">President</a></li>
                          <li><a href="../candidatecharts/vp.php">Vice President</a></li>
                          <li><a href="../candidatecharts/secretary.php">Secretary</a></li>
                          <li><a href="../candidatecharts/treasurer.php">Treasurer</a></li>
                          <li><a href="../candidatech.arts/auditor.php">Auditor</a></li>
                          <li><a href="../candidatecharts/massmedia.php">Mass Media</a></li>
                          <li><a href="../candidatecharts/peaceOficer.php">Peace Officer</a></li>
                          <li><a href="../candidatecharts/activitycoor.php">Activity Coordinator</a></li>
                        </ul>


                <h2 style="text-align:center; font-size:20px;">Total Candidates</h2>
                     <div class="total-candidates">
                      <?php
                    require '../dbcon.php';
                      $count =   $conn->query("SELECT COUNT(*) as total FROM `candidate` WHERE status='approved'")->fetch_array();
                    ?>
                     <p>
                      <a href="../candidates/pres.php">View Candidates</a><br>
                      <?php echo $count['total']; ?>
                        
                      </p>                              
                    </div>

       

                <h2 style="text-align:center; font-size:20px;">Total Voters</h2>
                        <div class="total-voters">
                          <?php
                        require '../dbcon.php';
                          $count =   $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE status1=''")->fetch_array();
                        ?>
                         <p>                            
                          <a href="../candidatecharts/voters.php">View voters</a><br>                            
                          <?php echo $count['total']; ?>                               
                         </p>

                        </div>
         
       </div>
       <div class="chart-content3">
            <h2>Registered Candidates</h2>

                             <center>
                                <div class="select">
                                <select onchange = "page(this.value)">
                                <option disabled selected>Select Candidate Group</option>
                                <option value="pres.php">President</option>
                                <option value = "vp.php">Vice President</option>
                                <option value = "secretary.php">Secretary</option>
                                <option value = "treasurer.php">Treasurer</option>
                                <option value = "auditor.php">Auditor</option>
                                <option value = "massmedia.php" >Mass Media Officer</option>
                                <option disabled selected>Peace Officer</option>
                                <option value = "activitycoor.php">Activity Coordinator</option>                           
                                </select>
                                </div>
                            </center>

                    <script>
                        function page (src){
                            window.location=src;
                    }
                    </script>
                        <div class="panel-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover" border="0">
                                        <thead class="thead">
                                            <tr>
                                                <th>Image</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <!-- <th>Email Add</th> -->
                                                <th>Party</th>
                                                <th>Department</th>
                                                <th>Year Level</th>
                                                <th>Gender</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                            <?php 
                                                require '../dbcon.php';
                                                $bool = false;
                                                 $query = $conn->query("SELECT candidate.candidate_id, candidate.img, candidate.position,tbl_partylist.partylist_id, tbl_partylist.party, candidate.firstname, candidate.lastname, candidate.email, candidate.department, candidate.year_level, candidate.gender FROM candidate INNER JOIN tbl_partylist ON candidate.partylist_id = tbl_partylist.partylist_id WHERE status = 'approved' and position = 'President' ORDER BY candidate_id");
                                                    while($row = $query->fetch_array()){
                                                        $candidate_id=$row['candidate_id'];
                                            ?>
                                                
                                                <td width="50"><img src="../admin/<?php echo $row['img']; ?>" width="50" height="50" class="img-rounded"></td>
                                                <td><?php echo $row ['firstname'];?></td>
                                                <td><?php echo $row ['lastname'];?></td>
                                                <!-- <td><?php echo $row ['email'];?></td> -->
                                                <td><?php echo $row ['party'];?></td>
                                                <td><?php echo $row ['department'];?></td>
                                                <td><?php echo $row ['year_level'];?></td>
                                                <td><?php echo $row ['gender'];?></td>
                                            </tr>
                                            
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                            
                                   
                        </div>

                    </div>
                </div>
            
            </div>


                  
        <?php 
            include ('script.php');
            
        ?>                     
</body>
</html>