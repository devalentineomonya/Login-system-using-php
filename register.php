<link rel="stylesheet" href="css/styles.css">


<div class="login_form">
   <br>
   <p class="register">Sign Up</p>
   <form action="" method="post">

      <br>
      <label for="first_name">First Name</label>
      <br>
      <input class="form_input" type="text" name="first_name" id="first_name">
      <br>
      <label for="last_name">Last Name</label>
      <br>
      <input class="form_input" type="text" name="last_name" id="last_name">
      <br>
      <label for="location">Location</label>
      <br>
      <input class="form_input" type="text" name="location" id="location">
      <br>
      <label for="email">Email</label>
      <br>
      <input class="form_input" type="email" name="email" id="email">
      <br>
      <label for="password">Password</label>
      <br>
      <input class="form_input" type="password" name="password" id="password">
      <br><br>
      <input class="btn_success" type="submit" value="Add New Admin">


      <a href="index.php" class="btn_cancel" type="submit">Login</a>
   </form>
   <?php include('config/constants.php'); ?>
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["first_name"])) {
         $_SESSION['nameErr'] = "<div class='nameErr'>First Name is required</div>";
         echo $_SESSION['nameErr'];
         unset($_SESSION['nameErr']);
      } else if (empty($_POST["last_name"])) {
         $_SESSION['nameErr'] = "<div class='nameErr'>Last Name is required
  
      </div>";
         echo $_SESSION['nameErr'];
         unset($_SESSION['nameErr']);
      } else if (empty($_POST["location"])) {
         $_SESSION['nameErr'] = "<div class='nameErr'>Location is required</div>";
         echo $_SESSION['nameErr'];
         unset($_SESSION['nameErr']);
      } else if (empty($_POST["email"])) {
         $_SESSION['nameErr'] = "<div class='nameErr'>Email is required</div>";
         echo $_SESSION['nameErr'];
         unset($_SESSION['nameErr']);
      } else if (empty($_POST["password"])) {
         $_SESSION['nameErr'] = "<div class='nameErr'>Password is required</div>";
         echo $_SESSION['nameErr'];
         unset($_SESSION['nameErr']);
      } else {

         $first_name = stripslashes(trim(htmlspecialchars($_POST['first_name'])));
         $last_name = stripslashes(trim(htmlspecialchars($_POST['last_name'])));
         $location = stripslashes(trim(htmlspecialchars($_POST['location'])));
         $email = stripslashes(trim(htmlspecialchars($_POST['email'])));
         $password = stripslashes(trim(htmlspecialchars($_POST['password'])));
         $sql1 = "SELECT *FROM tbl_users WHERE email = '$email'";
         $result = mysqli_query($conn, $sql1);

         if (mysqli_num_rows($result)  != 0) {
            $_SESSION['nameErr'] = "<div class= 'nameErr'>
            <p>This email is used, Try another one please!</p>
            </div>";
            echo $_SESSION['nameErr'];
            unset($_SESSION['nameErr']);
         } else {
            $sql = "INSERT INTO tbl_users SET
            first_name ='$first_name',
            last_name = '$last_name',
            location = '$location',
            email = '$email',
            password = '$password'
            ";
            $res = mysqli_query($conn, $sql);
            if ($res == TRUE) {
               $_SESSION['nameSuc'] = "<div class= 'nameSuc'>
               <p>You have Successfully Added a New Admin!</p>
               </div>";
               echo $_SESSION['nameSuc'];
               header("Location: index.php");
            }
         }
      }
   }


   ?>
</div>