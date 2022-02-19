<?php
include 'connection_config.php';

session_start();
error_reporting(0);

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password= '$password' ";
    $result = mysqli_query($con,$sql);
    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        header("Location:welcome.php");

    }else{
        echo "<script>alert('Email or Password is wrong')</script>";
    }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>user login</title>
  </head>
  <body>
  <body>

      <div class= "row">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4">
          <div class="login_form">
              <h3 style="text-align: center;">Login Account</h3>    
          <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name='email' type="email" value="<?php echo $email?>" class="form-control" >
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input  name='password' type="password" value="<?php echo $_POST['password']?>"  class="form-control" >
            </div>
            
            <button name='submit' class="form_btn">Login</button>
            </form>
            <p style="font-size: 12px; text-align: center; margin-top: 10px;">
            <a href="fogot-password.php" style="color: #00376b;">Forgot Password</a>
            </p>
            <p>Don't have an account?<a href="signup.php">Sign up</a></p>
            </div>
          </div>
          <div class="col-sm-4">
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>