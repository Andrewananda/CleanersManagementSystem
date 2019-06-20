<?php include'layouts/header.php';?>
<?php include'connection.php';?>

<?php include'layouts/sections/sidebar.php';?>

<div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>First_name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Phone</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>First_name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Phone</th>
                  </tr>
                </tfoot>
                <tbody>
        <?php  
          $query = mysqli_query($conn,"SELECT * FROM users WHERE user_type = 'client' ORDER BY id DESC");
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
