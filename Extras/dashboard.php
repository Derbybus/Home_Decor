<?php


session_start();
$a_Name= $_SESSION['Admin_Name'];

if(isset($a_Name))
{
    
    echo  'Welcome '.$_SESSION['Admin_Name'];
    // echo '<a href="/ClientMgtSystem/logout.php"> Logout</a>';
    
}
else{
    
    echo '<a href="/Ecommerce/Home.php"> Home</a>';
    

}


?>