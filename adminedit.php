<?php
    include 'Pages/Adminhead.php';
  
    session_start();
    
    $_SESSION['edit1']= $_GET['edit1']; 
    $editId = $_SESSION['edit1'];


    // $a_Id = filter_input(INPUT_POST,'Admin_Id',FILTER_SANITIZE_SPECIAL_CHARS);
    // $a_Name = filter_input(INPUT_POST,'Admin_Name',FILTER_SANITIZE_SPECIAL_CHARS);
    // $a_Email = filter_input(INPUT_POST,'Email',FILTER_SANITIZE_SPECIAL_CHARS);
    // $a_Password = filter_input(INPUT_POST,'Password',FILTER_SANITIZE_SPECIAL_CHARS);

   $sql ="select * from admin where Admin_Id = $editId"; 
   $query =mysqli_query($connect,$sql); 
   $data =mysqli_fetch_array($query); 


     if(isset($_POST['Update']))
    {
      
      $_SESSION['edit1'] =$_GET['edit1'];
      $query = "Update admin set Admin_Name ='$_POST[Admin_Name]', Email='$_POST[Email]', Password ='$_POST[Password]' WHERE Admin_Id=$editId";
      $query_run = mysqli_query($connect, $query);
      
      if($query_run) 
      {
        echo 'Products updated';
        header('Location:listadmin.php');
      }
      else{
        echo 'Products not updated';
      }
    }

 
  
    

?>



  <div class="container d-flex flex-column align-items-center">
    
    <h2 style="text-align: center;">List of Staff</h2>
    <p class="lead text-center"></p>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit1=<?php echo $editId; ?>" class="mt-4 w-75" method="post">
    
    <div class="mb-3">
        <label for="id" class="form-label">Admin Id</label>
        <input type="text" class="form-control" id="product_id" name="Admin_Id" value="<?php echo $editId;?>">
        
        <input type="hidden" class="form-control" id="Admin_Id" name="edit" placeholder="Enter your Contact">
      
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="Admin_Name" value="<?php echo $data['Admin_Name'];?>">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="Email" value="<?php echo $data['Email'];?>">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="price" name="Password" value="<?php echo $data['Password'];?>">
      </div>
      
      <div class="sign">
        <input type="submit" name="Update" value="Update" class="btn btn-dark w-100">
      </div>

    </form>
    </div>
    </div>

<?php
    include 'Pages/footer.php';


?>