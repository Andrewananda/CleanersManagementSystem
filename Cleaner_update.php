<?php include'layouts/header.php';?>
<?php include'connection.php';?>
<?php
$id = $_GET['id'];
$rows = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'");
$cleaner = mysqli_fetch_array($rows);

?>
<?php

if(isset($_POST['submit']))
{

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
   $sql = "UPDATE `users` SET `first_name`='$first_name', `last_name`='$last_name', `phone`='$phone',`email`='$email', `password`='$password' WHERE `id`='$id'";
   $run = mysqli_query($conn,$sql);


   if($run && mysqli_affected_rows($conn) === 1)
   {
       echo 'success';
       header("Location: allClients.php");
   }
   else
   {
       die(mysqli_connect_error($conn));
   }
    
   

}
?>









<?php include'layouts/sections/sidebar.php';?>
<div class="col">
    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-0">
        <div class="card-header">
            <h4 class="card-title">Edit Cleaner</h4>
            <small class="block">(edit Cleaner)</small>
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
    <div class="card-content collapse show">
            <div class="card-body">
              <div class="Cleaner_form_holder">
             <form enctype="multipart/form-data" method="POST" action="Cleaner_update.php">
                                         
                            <div class="tr row">
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label"  for="first_name">first_name<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input text-align="" value="<?php echo $cleaner['first_name'];?>" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="text" name="first_name" id="first_name" placeholder="Enter first_name">
                                    </div>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="last_name">last_name<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input value="<?php echo $cleaner['last_name'];?>" text-align="" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="text" name="last_name" id="last_name" placeholder="Enter last_name">
                                    </div>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="phone">phone<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input value="<?php echo $cleaner['phone'];?>" text-align="" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="text" name="phone" id="phone" placeholder="Enter phone">
                                    </div>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="email">email<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input value="<?php echo $cleaner['email'];?>" text-align="" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="email" name="email" id="email" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="password">Change password<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input value="<?php echo $cleaner['password'];?>" text-align="" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="password" name="password" id="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="password_confirm">confirm password<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input value="<?php echo $cleaner['password'];?>" text-align="" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="password" name="password_confirm" id="password_confirm" placeholder="confirm password">
                                    </div>
                                </div>
                               
                            </div>
                            <br>
                            <br>
                            <input type="hidden" name="id" value="<?php echo $cleaner['id'];?>">
                            <div style="text-align:center;padding:8px;">
                            <button name="submit" class="btn btn-primary ui-button" >Update</button>
                        </div>

                    </form>

                <div>

            </div>
          </div>
         </div>
    </div>

</div>






<?php include'layouts/footer.php'?>
 