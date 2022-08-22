<?php
include 'Pages/Adminhead.php';

session_start();

    if(isset($_POST['Login']))
    {
    
        $a_Name = filter_input(INPUT_POST,'Admin_Name',FILTER_SANITIZE_SPECIAL_CHARS);
        $a_Password = filter_input(INPUT_POST,'Password',FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "Select * from admin where Admin_Name='$a_Name' && Password='$a_Password' ";
        $result = mysqli_query($connect,$sql);
        $check = mysqli_fetch_array($result);

        if(isset($check))
        {
            if($check['Admin_Name'] ==$a_Name){
                $_SESSION['Admin_Name'] = $check['Admin_Name'];
                $_SESSION['Password']=$check['Password'];
                header('Location:listadmin.php');

            }else
            {
                echo 'failure';
            }
        }
      
    }

    

?>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="row" method="POST">
     
     <div class="mb-3">
       <label >Enter Username</label>
       <input type="text" name="Admin_Name" placeholder="Enter your name">
     </div>
     
     <div class="mb-3">
       <label >Enter Password</label>
       <input type="text" name="Password" placeholder="Enter your password">
     </div>

     <div class="mb-3">
       <input type="submit" name="Login" value="Login">
     </div>

     <div class="signup"><center>Don't have an account yet? <a href="AdminReg.php">Sign Up Here</a></center></div>

       
     </div>
     
   </form>


<?php
    include 'Pages/footer.php';


?>



