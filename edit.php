<?php
    include 'Pages/Adminhead.php';
  
    session_start();
    
    $_SESSION['edit']= $_GET['edit']; 
    $edit_Id = $_SESSION['edit'];


   $sql ="select * from products where Admin_Id = $edit_Id"; 
   $query =mysqli_query($connect,$sql); 
   $data =mysqli_fetch_array($query);

     if(isset($_POST['Update']))
    {
      
      $_SESSION['edit'] =$_GET['edit'];
      $query = "Update products set Product_Id='$_POST[Product_Id]', Name ='$_POST[Name]', Description='$_POST[Description]', Price='$_POST[Price]', Image='$_POST[Image]', Stock_status='$_POST[Stock_status]' WHERE Admin_Id =$edit_Id";
    
      $query_run = mysqli_query($connect, $query);
    
      
      if($query_run) 
      {
        echo 'Products updated';
         header('Location:Products.php');
      }
      else{
        echo 'Products not updated';
      }
    }
    

?>



  <div class="container d-flex flex-column align-items-center">

    <h2 style="text-align: center;">List of Products</h2>
    <p class="lead text-center"></p>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $edit_Id; ?>" class="mt-4 w-75" method="post">
    <div class="mb-3">
        <label for="id" class="form-label">Product Id</label>
        <input type="text" class="form-control" id="product_id" name="Product_Id" value="<?php echo $data['Product_Id'];?>">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="Name" value="<?php echo $data['Name'];?>">
      </div>
      <div class="mb-3">
        <label for="Desc" class="form-label">Desc</label>
        <input type="text" class="form-control" id="dob" name="description" value="<?php echo $data['Description'];?>">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="Price" value="<?php echo $data['Price'];?>">
      </div>
      <div class="mb-3">
        <label for="picture" class="form-label">Image</label>
        <input type="file" class="form-control" id="Image" name="Image" value="<?php echo $data['Image'];?>">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock_status</label>
        <input type="text" class="form-control" id="status" name="Stock_status" value="<?php echo $data['Stock_status'];?>">
      </div>
      <div class="mb-3">
        <label for="id" class="form-label">Admin Id</label>
        <input type="text" class="form-control" id="product_id" name="Admin_Id" value="<?php echo $edit_Id;?>">
        
        <input type="hidden" class="form-control" id="Admin_Id" name="edit1" placeholder="Enter your Contact">
      
      </div>
      

     
      <div class="mb-3">
        <input type="submit" name="Update" value="Update" class="btn btn-dark w-100">
      </div>
    </form>
    </div>

<?php
    include 'Pages/footer.php';


?>