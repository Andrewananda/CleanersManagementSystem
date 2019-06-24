<?php
session_start();
include'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="index.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
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
<?php
if (isset($_POST['submit']))
{
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    
    $select ="SELECT * FROM `users` WHERE `password`='$password' AND `email`='$email'";
    $sql = mysqli_query($conn,$select);

   if($sql && mysqli_affected_rows($conn) === 1)
    {   
      foreach ($sql as $test)
      { }
      $_SESSION['user_id'] = $test['id'];
      $_SESSION['user_type'] = $test['user_type'];
      $_SESSION['user_name'] = $test['first_name'] ." ". $test['last_name'];
      $message1 = "Logged In successfully";
      if($_SESSION['user_type'] === "admin")
      {
      header("Location: dashboard.php");
      }
      elseif ($_SESSION['user_type'] === "cleaner")
      {
        header("Location: cleanersAttendance.php");
      }
      elseif ($_SESSION['user_type'] === "client")
      {
        header("Location: clientCleaners.php");
      }
    }
    else
    {
      echo "User_name or password does not exist";
    }

}

?>

