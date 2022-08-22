
<?php

include 'Pages/header.php';


   $sql ="Select * from products";
   $query =mysqli_query($connect,$sql); 
   $data =mysqli_fetch_all($query,MYSQLI_ASSOC); 

   if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
        $item = $row['Image'];
        $item = $row['Name'];
        $item = $row['Description'];

    }
    if(empty($data))
   {
    echo 'No data found';
   }
   }

?>


<!-- <link rel="stylesheet" href="style.css"> -->

    <div class="categories">
        <div class="new">
            <div class="row-1">
                <div class="col-3">
                <table style="width:900px">
           
            <tbody>
            <?php foreach($data as $item): ?>
            <tr>
            <tr>
                <td ><?php echo $item['Name']; ?></td>
            </tr>
            <tr>
                <td><img src="<?php echo $item['Image']; ?>"></td>
            </tr>
            <tr>
                <td><?php echo $item['Description']; ?></td>
            </tr>
            </tr>
            <?php endforeach ?>
            </tbody>

            </table>
                </div>
            </div>
        </div>
    </div>

    <!-- featured products  -->
    <div class="small-container">
        <h2>Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/6.jpg" alt="">
                <h4>Red Deco</h4>
                <div class="ratings"></div>
                <p>GH1500.00</p>
            </div>

            <div class="col-4">
                <img src="images/8.jpg" alt="">
                <h4>Red Deco</h4>
                <div class="ratings"></div>
                <p>GH500.00</p>
            </div>

            <div class="col-4">
                <img src="images/4.jpg" alt="">
                <h4>Red Deco</h4>
                <div class="ratings"></div>
                <p>GH2000.00</p>
            </div>

        

        </div>
    </div>

<?php
    include 'Pages/footer.php';


?>

    