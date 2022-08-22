<?php
  

     include 'Pages/header.php';
  
    

    //stores form elements into varibles 
    $c_id = filter_input(INPUT_POST,'Customer_id',FILTER_SANITIZE_SPECIAL_CHARS);
    $c_name = filter_input(INPUT_POST,'Customer_name',FILTER_SANITIZE_SPECIAL_CHARS);
    $c_email = filter_input(INPUT_POST,'Customer_email',FILTER_SANITIZE_SPECIAL_CHARS);
    $c_password = filter_input(INPUT_POST,'Customer_password',FILTER_SANITIZE_SPECIAL_CHARS);
    
    if(isset($_POST['Sign_up']))
    {
      
      $sql = "insert into customer values('$c_id','$c_name','$c_email','$c_password')";

      if(mysqli_query($connect,$sql))
      {
        echo 'Login successful';
        header('Location:Home.php');
        
      }

      else{
        echo 'Login unsuccessful' .mysqli_error($connect);
      }

    }

    

?>

<link rel="stylesheet" href="style3.css">

<div class="table">
   
   <h2 style="text-align: center;">Customer Registration Details</h2>
   <p class="lead text-center"></p>
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="row" method="POST">
     <div class="mb-3">
       <label for="name" class="form-label">Customer Id</label>
       <input type="text" class="form-control" id="customer_id" name="Customer_id" placeholder="Enter your id">
     </div> 
     <div class="mb-3">
       <label for="name" class="form-label">Name</label>
       <input type="text" class="form-control" id="name" name="Customer_name" placeholder="Enter your name">
     </div>
     <div class="mb-3">
       <label for="email" class="form-label">Email</label>
       <input type="email" class="form-control" id="email" name="Customer_email" placeholder="example@gmail.com">
     </div>
     <div class="mb-3">
       <label for="password" class="form-label">Password</label>
       <input type="text" class="form-control" id="password" name="Customer_password" placeholder="Enter your password">
     </div>
    
     <div class="mb-3">
       <input type="submit" name="Sign_up" value="Sign up" class="btn btn-dark w-100">
     </div>

     <div class="signup"><center>Already have an account? <a href="clientlogin.php">Login Here</a></center></div>
   </form>
   </div>

  <?php
    include 'Pages/footer.php';


?>

