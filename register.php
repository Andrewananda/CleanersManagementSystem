<?php include'connection.php';?>
<?php

if(isset($_POST['submit']))
{
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $password = md5($_POST['password']);
  $user_type = $_POST['user_category_id'];
  $password_confirm = md5($_POST['confirmPassword']);
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  if($password == $password_confirm)
  {
    $insert = mysqli_query($conn,"INSERT INTO `users` (`first_name`,`last_name`,`password`,`user_type`,`email`,`status`,`phone`)" . " VALUES ('$first_name','$last_name','$password','$user_type','$email','1','$phone')");

    echo "Successfully created";
    header("Location: index.php");
  }
  else
  {
    die("error" . mysqli_connect_error($insert));
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" action="register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="first_name">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required="required">
                  <label for="last_name">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="form-row">
          <div class="col-md-6">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="email">Email address</label>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-label-group">
              <select style="width:100%"; name="user_category_id" id="user_category_id">
                <option value="">--Register As--</option>
                <?php 
                    $sql = mysqli_query($conn,"SELECT * FROM user_category");
                    if ($sql->num_rows > 0)
                    {
                    }
                    ?>
                     <?php foreach($sql as $row): ?>
                        <option name="user_category_id" id="user_category_id" value="<?php echo $row['title'];?>"><?php echo $row['title'];?></option>
                      
                     <?php endforeach; ?>

              </select>
             
            </div>
            </div>
          </div>
          </div>
          
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="phone" required="phone">
                  <label for="phone">phone</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="password" id="password" class="form-control" placeholder="password" required="required">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="submit" id="submit">Submit</button>
        </form>
        
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

