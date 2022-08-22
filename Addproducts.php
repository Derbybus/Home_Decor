<?php
  

  include 'Pages/Adminhead.php';

  session_start();
   $admin_id = $_GET['add_p'];
  

    $p_ID = filter_input(INPUT_POST,'Product_Id',FILTER_SANITIZE_SPECIAL_CHARS);
    $p_Name = filter_input(INPUT_POST,'Name',FILTER_SANITIZE_SPECIAL_CHARS);
    $p_Desc = filter_input(INPUT_POST,'Description',FILTER_SANITIZE_SPECIAL_CHARS);
    $p_price = filter_input(INPUT_POST,'Price',FILTER_SANITIZE_SPECIAL_CHARS);
    $p_image = filter_input(INPUT_POST,'Image',FILTER_SANITIZE_SPECIAL_CHARS);
    $p_stock = filter_input(INPUT_POST,'Stock-status',FILTER_SANITIZE_SPECIAL_CHARS);
    $a_Id = filter_input(INPUT_POST,'Admin_Id',FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($_POST['Add_Product']))
    {
      
      $allowed_ext =['png','jpg','jpeg','pdf'];
      if(!empty($_FILES['Image']['name']))
      {
        $file_name =$_FILES['Image']['name'];
        $file_size =$_FILES['Image']['size'];
        $file_tmp =$_FILES['Image']['tmp_name'];

        //where to upload to
        $target_dir ="uploads/${file_name}";
        $file_ext = explode('.',$file_name);//extract the extension
        $file_ext = strtolower(end($file_ext));//convert extrated extension to Lowercase 

        
        if(!in_array($file_name,$allowed_ext))
        {
          //upload file to folder if ext allowed
          
          move_uploaded_file($file_tmp,$target_dir);
          
        }else{
          echo 'invalid File type';
        }

      }
      
      //sql to add data to database from the input element
      $sql = "insert into products values($p_ID,'$p_Name','$p_Desc','$p_price','$target_dir','$p_stock','$a_Id')";

      if(mysqli_query($connect,$sql))
      {
        echo 'Product Added';
         header('Location:Products.php');
      }

      else{
        echo 'Product not added' .mysqli_error($connect);
      }


    }

?>



  <div class="container d-flex flex-column align-items-center">
    <h2></h2>
    <p class="lead text-center"></p>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="mt-4 w-75" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Product Id</label>
        <input type="text" class="form-control" id="product_id" name="Product_Id" placeholder="Enter ID">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="Name" placeholder="Enter your name">
      </div>
      <div class="mb-3">
        <label for="Desc" class="form-label">Desc</label>
        <input type="text" class="form-control" id="description" name="Description" placeholder="Describe details of product">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="Price" placeholder="Enter price">
      </div>
      <div class="mb-3">
        <label for="picture" class="form-label">Upload Picture</label>
        <input type="file" class="form-control" id="Image" name="Image" placeholder="upload">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock Status</label>
        <input type="text" class="form-control" id="status" name="Stock_status" placeholder="Enter availability of product">
      </div>
       <div class="mb-3">
        <label for="Admin" class="form-label">Admin Id</label>
        <input type="text" class="form-control" id="add_p" name="add_p" value="<?php echo $admin_id;?>">
      </div>



      
      


      <div class="mb-3">
        <input type="submit" name="Add_Product" value="Add product" class="btn btn-dark w-100">
      </div>
    </form>
    </div>

    
            

<?php
    include 'Pages/footer.php';


?>