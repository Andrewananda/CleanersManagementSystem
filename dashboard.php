<?php include'layouts/header.php';?>
<?php include'connection.php';?>
  <?php include'layouts/sections/sidebar.php';?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM clients");
                ?> 
                <div class="mr-5"><?php echo mysqli_num_rows($select);?> Clients</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="allClients.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM cleaners");
                ?>
                <div class="mr-5"><?php echo mysqli_num_rows($select);?> Cleaners</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="allCleaners.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM clients WHERE status = '1'");
                ?>
                <div class="mr-5"><?php echo mysqli_num_rows($select);?> Attendance</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="followups.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <?php 
                  $select = mysqli_query($conn,"SELECT * FROM clients WHERE status = '0'");
                ?>
                <div class="mr-5"><?php echo mysqli_num_rows($select);?> Pending followups</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="followups.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <!-- Area Chart Example-->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Clients</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Cleaner</th>
                    <th>Status</th>
                    <th>Phone</th>
                    <th>Schedule date</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Name</th>
                    <th>Cleaner</th>
                    <th>Status</th>
                    <th>Phone</th>
                    <th>Schedule date</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php 
            $select = mysqli_query($conn,"SELECT * FROM clients");
            foreach($select as $client)
            {
              ?>
                  <tr>
                    <td><?php echo $client['client_name'];?></td>
                    <td><?php echo $client['cleaner_name'];?></td>
                    <td>
                      <?php 
                      if($client['status']==='1')
                      {
                        ?>
                        <button class="btn btn-primary">Visited</button>
                        <?php
                      }else {
                        ?>
                        <button class="btn btn-danger">Pending</button>
                        <?php
                      }
                      
                      ?>
                    </td>
                    <td><?php echo $client['phone'];?></td>
                    <td><?php echo $client['schedule_date']?></td>
                  </tr>
                  <?php
                    }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->



<?php include'layouts/footer.php'?>
