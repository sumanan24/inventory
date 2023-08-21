<?php include_once('config.php'); ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style2.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">

    <div class="container">


<?php
if (isset($_POST['login'])) {
  $user = $_POST['user'];
 echo $pass = md5($_POST['pass']);

  $sql = "SELECT * FROM admin where Username= '$user'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) == 1) {
    $r = mysqli_fetch_assoc($result);
    echo "---" . $r['Password'];
    if ($pass == $r['Password']) {
      $_SESSION['user'] = $user;
      header("location: dashboard.php");
    } else {
      echo "error" . mysqli_error($con);
?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">

        <strong>Check your password !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    }
  } else {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>User not found !</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php
  }
}
?>


      <div class="forms-container">
        <div class="signin-signup">
        <form action="" class="sign-in-form" method="POST">
                    <h2 class="title">Sign-in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="user">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="pass">
                    </div>
                    <input type="submit" value="login" class="btn solid" name="login">
                </form>
         
            
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>Inventory Management System</h1>
           
           
          </div>
          <img src="img/inventory.svg" class="image" alt="" />
        </div>
        
      </div>
    </div>

    <script src="JS/app2.js"></script>
  </body>
</html>