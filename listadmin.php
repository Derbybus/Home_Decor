<?php
   include 'Pages/Adminhead.php';
   
   session_start();
   

   $sql ="Select * from admin";
   $query =mysqli_query($connect,$sql); 
   $data =mysqli_fetch_all($query,MYSQLI_ASSOC); 


   if(empty($data))
   {
    echo 'No data found';
   }




?>

<!-- <link rel="stylesheet" href="style3.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <div class="table">
   
    <h2 style="text-align: center;">List of Staff</h2>

    <div class="row">

      <table>
        <thead>
          <tr>
            <th>Admin ID</th>
            <th>Admin Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $item): ?>
          <tr>
            
            
            <td><?php echo $item['Admin_Id']; ?></td>
            <td><?php echo $item['Admin_Name']; ?></td>
            <td><?php echo $item['Email']; ?></td>
            <td><?php echo $item['Password']; ?></td>
            
           
            <td><a href="Addproducts.php?add_p=<?php echo $item['Admin_Id'];?>">Add</a>
              <a href="adminedit.php?edit1=<?php echo $item['Admin_Id'];?>">Edit</a> 
            <a href="deleteadmin.php?delete=<?php echo $item['Admin_Id'];?>" onclick="return confirm('Do you want to delete product?')">Delete</a></td>

          </tr>
          <?php endforeach ?>
        </tbody>
    
    
      </table>
     
   </div>
  </div>


<?php

  include 'Pages/footer.php';

?>



