<?php
include 'Pages/header.php';

session_start();

    if(isset($_POST['Login']))
    {
    
        $a_Name = filter_input(INPUT_POST,'Customer_name',FILTER_SANITIZE_SPECIAL_CHARS);
        $a_Password = filter_input(INPUT_POST,'Customer_password',FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "Select * from customer where Customer_name='$a_Name' && Customer_password='$a_Password' ";
        $result = mysqli_query($connect,$sql);
        $check = mysqli_fetch_array($result);

        if(isset($check))
        {
            if($check['Customer_name'] ==$a_Name){
                $_SESSION['Customer_name'] = $check['Customer_name'];
                $_SESSION['Customer_password']=$check['Customer_password'];
                header('Location:Home.php');

            }else
            {
                echo 'failure';
            }
        }
      
    }

    

?>

<link rel="stylesheet" href="style3.css">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="row" method="POST">
     
     <div class="mb-3">
       <label >Enter Username</label>
       <input type="text" name="Customer_name" placeholder="Enter your name">
     </div>
     
     <div class="mb-3">
       <label >Enter Password</label>
       <input type="text" name="Customer_password" placeholder="Enter your password">
     </div>

     <div class="mb-3">
       <input type="submit" name="Login" value="Login">
     </div>

     <div class="signup"><center>Don't have an account yet? <a href="CustomerReg.php">Sign Up Here</a></center></div>

       
     </div>
     
   </form>

<?php
    include 'Pages/footer.php';


?>