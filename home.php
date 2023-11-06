<?php
session_start();
if(!isset($_SESSION['valid'])){
   header("Location: index.php");
}
?>
<?php include("partials/menu.php");?>
<?php include("config/constants.php");?>
<?php
$Id =  $_SESSION['valid'];
 $sql = "SELECT*FROM tbl_users WHERE Id = $Id";
 $res = mysqli_query($conn,$sql);
 $data = mysqli_fetch_assoc($res);
$first_name = $data['first_name'];
$last_name=$data['last_name'];
$email=$data['email'];
$location=$data['location'];
 ?>
<link rel="stylesheet" href="css/styles.css">
<div class="container">
   <div class="current_user">
      <p>Your Name is <strong><?php echo $last_name;?> <?php echo  $first_name;?></strong></p>
      <p>Your Email is <strong><?php echo $email;?></strong></p>
      <p>Your Location is <strong><?php echo $location?></strong></p>
   </div>
</div>



<?php include("partials/footer.php");?>