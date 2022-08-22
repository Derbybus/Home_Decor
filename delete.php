<?php

include 'Pages/Adminhead.php';


    $delete = $_GET['delete'];
    $sql = "Delete from products where Admin_Id =$delete";

    if(mysqli_query($connect,$sql))
    {
        echo "Product deleted successfully";
        header('Location:Products.php');
    
    }
    else{
        echo "Error deleting product:" .mysqli_error($connect);
    }
    mysqli_close($connect);


?>
