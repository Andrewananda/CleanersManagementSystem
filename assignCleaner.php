<?php include'connection.php';?>
<?php include'layouts/header.php';?>
<?php include'layouts/sections/sidebar.php';?>
<div class="col">
    <div class="card border-top-pink border-top-3 border-bottom-blue border-bottom-3 box-shadow-0">
        <div class="card-header">
            <h4 class="card-title">Manage CLeaners</h4>
            <small class="block">(Add/edit Cleaners)</small>
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
              <div class="Client_form_holder">
             <form enctype="multipart/form-data" method="POST" action="assignCleaner.php">
                                         
                            <div class="tr row">
                            <?php
                                $getcleaners = mysqli_query($conn,"SELECT * FROM users WHERE user_type = 'cleaner'");
                                if ($getcleaners->num_rows > 0)
                                {
                                }
                            ?>
                                <div class="td-2 mws-form-item large">
                                    <label class="form-label" for="cleaner">Cleaner Name<small style="font-size:12px;"></small> </label>
                                    <select style="width:100%;" name="cleaner" id="cleaner">
                                            <option class="mws-textinput form-input form-control" name="cleaner" id="cleaner" value="">---Select Cleaner---</option>
                                            <?php foreach($getcleaners as $cleaner)
                                            {
                                                ?>
                                            <option class="mws-textinput form-input form-control" name="cleaner" id="cleaner" value="<?php $cleaner['id']?>"><?php echo $cleaner['first_name'] ." " . $cleaner['last_name'];?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="td-2 mws-form-item large">
                                     <?php $getclient = mysqli_query($conn,"SELECT * FROM users WHERE user_type = 'client'");   
                                        if($getclient->num_rows > 0)
                                        {
                                        }
                                     ?>

                                    <label class="form-label" for="id">Client Name<small style="font-size:12px;"></small> </label>
                                    <select style="width:100%;" name="client_id" id="client_id">
                                            <option class="mws-textinput form-input form-control" id="client_id" value="">---Select Client---</option>
                                            <?php foreach($getclient as $client)
                                            {
                                                ?>
                                            <option class="mws-textinput form-input form-control" name="client_name" id="client_name" value="<?php $client['id'] ?>"><?php echo $client['first_name'] . " " . $client['last_name'];?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="schedule_date">Schedule Date<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                        <input value="" text-align="" required="required" class="mws-textinput form-input form-control " style="width:100%;" type="date" name="schedule_date" id="schedule_date" >
                                    </div>
                                </div>
                                <div class="td-2 mws-form-item large col-sm-4">
                                    <div>
                                        <label class="form-label" for="description">Additional Notes<small style="font-size:12px;"></small> </label>
                                    </div>
                                    <div>
                                    <textarea style="height:100px;" name="description" id="description" cols="30" rows="10" placeholder="Enter Additional Note"></textarea>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <br>
                            <div style="text-align:center;padding:8px;">
                            <button name="submit" class="btn btn-primary ui-button" >submit</button>
                        </div>

                    </form>

                <div>

            </div>
          </div>
         </div>
    </div>

</div>

<?php include'layouts/footer.php'?>
<?php 
if(isset($_POST['submit']))
{
    $cleaner_name = $cleaner['first_name'] . " " . $cleaner['last_name'];
    $client_name = $client['first_name'] . " " . $client['last_name'];
    $schedule_date = $_POST['schedule_date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `cleaners` (`cleaner_name`,`client_name`,`schedule_date`, `description`) VALUES('$cleaner_name','$client_name','$schedule_date','$description')";
    $assignCleaner = mysqli_query($conn,$sql);


    if ($assignCleaner)
    {
        echo "Cleaner added Successfully";
    }
    else
    {
        die("an error occured" . mysqli_connect_error($conn));
    }

}


//Insert same content into clients database to share the information later update

if(isset($_POST['submit']))
{
    $cleaner_name = $cleaner['first_name'] . " " . $cleaner['last_name'];
    $client_name = $client['first_name'] . " " . $client['last_name'];
    $schedule_date = $_POST['schedule_date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `clients` (`cleaner_name`,`client_name`,`schedule_date`) VALUES('$cleaner_name','$client_name','$schedule_date')";
    $assignCleaner = mysqli_query($conn,$sql);


    if ($assignCleaner)
    {
        echo "Cleaner added Successfully";
    }
    else
    {
        die("an error occured" . mysqli_connect_error($conn));
    }

}






?>
