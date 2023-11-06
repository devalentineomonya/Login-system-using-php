<?php 

session_start()
?>

<link rel="stylesheet" href="css/styles.css">

<div class="login_form">
   <br>
<p class="register">Sign In</p>
   <form action="" method="post">

      <br>
      <label for="email">Email</label>
      <br>
      <input class="form_input" type="email" name="email" id="email">
      <br>
      <label for="password">Password</label>
      <br>
      <input class="form_input" type="password" name="password" id="password">
      <br><br>
      <button class="btn_success" type="submit">Login</button>
      <a class="btn_cancel" type="cancel" href="register.php">Add New Admin</a>
   </form>
   <?php  include("config/constants.php");?>
   <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (empty($_POST["email"])) {
            $_SESSION['nameErr'] = "<div class='nameErr'>Email is required</div>";
            echo $_SESSION['nameErr'];
            unset($_SESSION['nameErr']);
         } else if (empty($_POST["password"])) {
            $_SESSION['nameErr'] = "<div class='nameErr'>Password is required
     
         </div>";
            echo $_SESSION['nameErr'];
            unset($_SESSION['nameErr']);
         }else{
            $email = stripslashes(trim(htmlspecialchars($_POST['email'])));
            $password = stripslashes(trim(htmlspecialchars($_POST['password'])));
            $sql = "SELECT *  FROM tbl_users WHERE email = '$email' AND password ='$password' ";
            $res = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($res);
            $count = mysqli_num_rows($res);
            if($count>0){
              $_SESSION ['valid']= $data['Id'];
              $_SESSION['email']= $data['email'];
              $_SESSION['first_name']=$data['first_name'];
              $_SESSION['last_name']=$data['last_name'];
              $_SESSION['location'] = $data['location'];
            if(isset($_SESSION['valid'])){
               header("Location: home.php");
            }
            }else{
               $_SESSION['nameErr'] = "<div class='nameErr'>Wrong email or Password
               </div>";
               echo $_SESSION['nameErr'];
               unset($_SESSION['nameErr']);
            }

         }
      }
   ?>
</div>