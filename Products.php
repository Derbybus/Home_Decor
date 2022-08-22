<?php
   include 'Pages/Adminhead.php';

   session_start();

   $sql ="Select * from products";
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
   
    <h2 style="text-align: center;">List of Products</h2>

    <div class="row">

      <table>
        <thead>
          <tr>
            <th>Image</th>
            <th>Product_No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <!-- <th>Admin_Id</th> -->
            <th>Actions</th>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $item): ?>
          <tr>
            
            <td><img src="<?php echo $item['Image']; ?>" width="50px" height="50px"></td>
            <td><?php echo $item['Product_Id']; ?></td>
            <td><?php echo $item['Name']; ?></td>
            <td><?php echo $item['Description']; ?></td>
            <td><?php echo $item['Price']; ?></td>
            <td><?php echo $item['Stock_status']; ?></td>
           
            <td><a href="Home.php">View</a>
              <a href="edit.php?edit=<?php echo $item['Admin_Id'];?>">Edit</a> 
            <a href="delete.php?delete=<?php echo $item['Admin_Id'];?>" onclick="return confirm('Do you want to delete product?')">Delete</a></td>

          </tr>
          <?php endforeach ?>
        </tbody>
    
    
      </table>
     
   </div>
  </div>


<?php

  include 'Pages/footer.php';

?>



