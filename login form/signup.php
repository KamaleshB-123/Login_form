<?php
include 'connection_config.php';

error_reporting(0);
if(isset($_POST['submit'])){
    $FirstName = $_POST['First_Name'];
    $LastName = $_POST['Last_Name'];
    $UserName = $_POST['user_Name'];
    $Email = $_POST['Email'];
    $Password = md5($_POST['password']);
    $Confirm_password = md5($_POST['confirm_password']);

    if($Password == $Confirm_password){
        $sql ="SELECT * FROM users WHERE email='$Email'";
        $result = mysqli_query($con,$sql);
        if(!$result->num_rows>0){  
            $sql = "INSERT INTO users (first_name, last_name, username, email, password) 
                    VALUES ('$FirstName','$LastName','$UserName','$Email','$Password')";
            $result = mysqli_query($con,$sql);
            if($result){
                echo "<script>alert('User Registration completed.')</script>";
                $FirstName = "";
                $LastName = "";
                $UserName = "";
                $Email = "";
                $_POST['password'] = "";
                $_POST['confirm_password'] = "";
            }else{
                echo "<script>alert('Somthing Went Wrong.')</script>";
            }
        }else{
            echo "<script>alert('Email Already Exist')</script>";
    }

    }else{
        echo "<script>alert('Password Not Matched.')</script>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>user signup</title>
  </head>
  <div class= "row">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4">
          <div class="login_form">
              <h3 style="text-align: center;">Create An New Account</h3>    
          <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">First Name</label>
                <input type="text" name="First_Name" class="form-control" placeholder="FirstName" value="<?php echo $FirstName?>" required>
                
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Last Name</label>
                <input type="text" name="Last_Name" class="form-control" placeholder="LastName" value="<?php echo $LastName?>" required>
                
            </div>
            <div class="mb-3">
            <label for="" class="form-label">UserName</label>
                <input type="text" name="user_Name" class="form-control" placeholder="UserName" value="<?php echo $UserName?>" required>
                
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email" value="<?php echo $Email?>" required>
                
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Password</label>
                <input type ="password" name="password" class="form-control" placeholder="Password" value="<?php echo $_POST['password']?>" required>
                
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Confirm Password</label>
                <input type ="password"  name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $_POST['confirm_password']?>" required>              
            </div>  
            <button name="submit" class="form_btn">Register</button>
            </form>
            <p>Already I have an account<a href="login.php">Login</a></p>
            </div>
          </div>
          <div class="col-sm-4">
          </div>
      </div>
  </body>
</html>