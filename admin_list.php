<?php include('config/constants.php');?>
<?php include('partials/menu.php');?>
<link rel="stylesheet" href="css/styles.css">
<a href="add_admin.php" class="btn_primary">Add Admin</a>
      <br>
      <br>
      <table class="tbl_full">
         <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Location</th>
            <th>Email</th>
            <th>Actions</th>
         </tr>


      <?php 
      //Get all admins from database
      $sql = "SELECT*FROM tbl_users"; 
      $res= mysqli_query($conn,$sql);//executes Query
  
      if($res==TRUE){
         $count = mysqli_num_rows($res);
         //create A variable and assign a value
         $sn=1;
         if($count>0){
            while($rows = mysqli_fetch_assoc($res)){
               //Using while loop to gey all the data form the table
            //Get individual data
            $Id = $rows['Id'];
            $first_name= $rows['first_name'];
            $first_name= $rows['first_name'];
            $last_name= $rows['last_name'];
            $location= $rows['location'];
            $email= $rows['email'];
            //display value in table
            ?>
         <tr>
            <td><?php echo $sn++?></td>
            <td><?php echo $first_name?> <?php echo $last_name?></td>
            <td><?php echo $location?></td>
            <td><?php echo $email?></td>
            <td>       
               <a href="update_admin.php?Id=<?php echo $Id;?>" class="btn_secondary">Update</a>
       
               <a href="delete_admin.php?Id=<?php echo $Id;?> "class="btn_danger">Delete </a>

            </td>
         </tr>
            <?php
            }
         }else{

         }
      }
      ?>
      </table>

      <?php include('partials/footer.php');?>