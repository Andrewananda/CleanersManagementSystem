<?php
if(!isset($_SESSION))
{
    session_start();
}

?>
<?php include'layouts/header.php';?>
<?php include'connection.php';?>

<?php include'layouts/sections/sidebar.php';?>

<div class="col">
    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-0">
        <div class="card-header">
            <h4 class="card-title">My Cleaners</h4>
            <small class="block">(Cleaners)</small>
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
                  <th>Name</th>
                  <th>Phone</th>
                    <th>schedule_date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>schedule_date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                </tfoot>
                <tbody>
        <?php  
        $id = $_SESSION['user_id'];
          $query = mysqli_query($conn,"SELECT  users.phone as phone,clients.id as id, clients.schedule_date as schedule_date, clients.cleaner_name as cleaner_name, clients.status as status FROM `clients` INNER JOIN users ON clients.user_id = users.id WHERE users.id = $id ORDER BY clients.id DESC ");
          if($query->num_rows > 0)
          {
              foreach($query as $row)
              {
                ?>
                  <tr>
                    <td><?=$row['cleaner_name'];?></td>
                    <td><?=$row['phone']?></td>
                    <td><?=date($row['schedule_date']);?></td>
                    <td>
                        <?php 
                        if($row['status']== 1)
                        {
                           ?>
                           <button class="btn btn-info">Cleaned</button>
                           <?php
                        }
                        else
                        {
                            ?>
                            <button class="btn btn-danger">UnCleaned</button>
                            <?php
                        }
                        ?>
                    </td>
                    

                    
                    <td>
                    <form action="clientCleaners.php" method="post">
                      <button class="btn btn-success" type="submit" id="submit" name="submit">Confirm</button>
                      </form>
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
<?php 
if (isset($_POST['submit']))
{
    $sql = "UPDATE clients SET `status`= '1' WHERE `user_id` = '$id'";
    $update = mysqli_query($conn,$sql);
    if ($update && mysqli_affected_rows === 1)
    {
        header("Location: clientCleaners.php");
    }

}


?>
