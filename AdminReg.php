<?php
  

    include 'Pages/Adminhead.php';
  
    

    $a_Id = filter_input(INPUT_POST,'Admin_Id',FILTER_SANITIZE_SPECIAL_CHARS);
    $a_Name = filter_input(INPUT_POST,'Admin_Name',FILTER_SANITIZE_SPECIAL_CHARS);
    $a_Email = filter_input(INPUT_POST,'Email',FILTER_SANITIZE_SPECIAL_CHARS);
    $a_Password = filter_input(INPUT_POST,'Password',FILTER_SANITIZE_SPECIAL_CHARS);
    
    if(isset($_POST['Register']))
    {
      
      $sql = "insert into admin values('$a_Id','$a_Name','$a_Email','$a_Password')";

      if(mysqli_query($connect,$sql))
      {
        echo 'registration successful';
        header('Location:listadmin.php');
        
      }

      else{
        echo 'Login unsuccessful' .mysqli_error($connect);
      }

    }


    

?>


    

<link rel="stylesheet" href="style3.css">

<div class="table">
   
   <h2 style="text-align: center;">Create an Account</h2>
   <p class="lead text-center"></p>
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="row" method="POST">
     <div class="mb-3">
       <label for="name" class="form-label">Admin Id</label>
       <input type="text" class="form-control" id="Admin_Id" name="Admin_Id" placeholder="Enter your id">
     </div> 
     <div class="mb-3">
       <label for="name" class="form-label">Name</label>
       <input type="text" class="form-control" id="name" name="Admin_Name" placeholder="Enter your name">
     </div>
     <div class="mb-3">
       <label for="email" class="form-label">Email</label>
       <input type="email" class="form-control" id="Email" name="Email" placeholder="example@gmail.com">
     </div>
     <div class="mb-3">
       <label for="password" class="form-label">Password</label>
       <input type="text" class="form-control" id="password" name="Password" placeholder="Enter your password">
     </div>
    
     <div class="mb-3">
       <input type="submit" name="Register" value="Register" class="btn btn-dark w-100">
     </div>

     <div class="signup"><center>Already have an account? <a href="Login.php">Login Here</a></center></div>
   </form>
   </div>


<?php
    include 'Pages/footer.php';


?>