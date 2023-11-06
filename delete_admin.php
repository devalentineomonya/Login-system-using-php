<?php include('config/constants.php');?>
<?php
$Id = $_GET['Id'];
$sql = "DELETE FROM tbl_users WHERE Id = $Id";
$res = mysqli_query($conn,$sql);
if($res>0){
   header('Location: admin_list.php');

}
