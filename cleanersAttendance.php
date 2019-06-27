<?php
if (!isset($_SESSION))
{
    session_start();
}
$user_id = $_SESSION['user_id'];

?>
<?php include 'connection.php'; ?>
<?php include'layouts/header.php';?>
<?php include'layouts/sections/sidebar.php';?>

<div class="col">
    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-0">
        <div class="card-header">
            <h4 class="card-title">My Attendance</h4>
            <small class="block">(Attendance )</small>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>    
    </div>

<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>Client name</th>
                    <th>Compliment</th>
                    <th>Schedule Date</th>
                    <th>Client Phone</th>
                    <th>Status</th>
                  </tr>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Client name</th>
                    <th>Compliment</th>
                    <th>Schedule Date</th>
                    <th>Client Phone</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
                <tbody>
        <?php  
          $query = mysqli_query($conn,"SELECT * FROM clients WHERE user_id = '$user_id' ORDER BY id DESC");
          if($query->num_rows > 0)
          {
              foreach($query as $row)
              {
                ?>
                  <tr>
                    <td><?=$row['client_name'];?></td>
                    <td><?=$row['compliment'];?></td>
                    <td><?=$row['schedule_date'];?></td>
                    <td><?=$row['phone'];?></td>
                    <?php 
                        if($row['status']  === '1')
                        {
                            ?>
                            <td class="btn btn-info">Visited</td>
                            <?php
                        }
                        elseif($row['status'] === '0')
                        {
                            ?>
                            <td class="btn btn-danger">Pending</td>
                            <?php
                        }
                    
                    ?>
                  </tr>
                  <?php

              }
          }
          

            
        ?>
                
                </tbody>
              </table>
            </div>
          </div>


<?php include'layouts/footer.php'?>
