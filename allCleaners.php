<?php include'layouts/header.php';?>
<?php include'connection.php';?>

<?php include'layouts/sections/sidebar.php';?>

<div class="col">
    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-0">
        <div class="card-header">
            <h4 class="card-title">All Cleaners</h4>
            <small class="block">(Edit Cleaners)</small>
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
                    <th>First_name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>First_name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
        <?php  
          $query = mysqli_query($conn,"SELECT * FROM users WHERE user_type = 'cleaner' ORDER BY id DESC");
          if($query->num_rows > 0)
          {
              foreach($query as $row)
              {
                ?>
                  <tr>
                    <td><?=$row['first_name'];?></td>
                    <td><?=$row['last_name'];?></td>
                    <td><?=$row['email'];?></td>
                    <td><?=$row['phone'];?></td>
                    <td>
                      <a href="Cleaner_update.php?id=<?php echo $row['id'];?>"><button class="btn btn-success">Edit</button></a>
                    </td>
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
