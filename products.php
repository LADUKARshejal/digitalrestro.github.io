<?php
session_start();


@include 'config.php';
      $name_='';
      if(isset($_GET['nam'])){
        
         $name_=$_GET['nam'];
        
      }
      

        

if(isset($_POST['add_to_cart_Main_Course'])){
   
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];

   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE (name = '$product_name' AND table_number ='$name_')");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, prise, image, quantity,table_number,is_confirmed) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$name_',0)");
      $message[] = 'product added to cart succesfully';
   }

}


if(isset($_POST['add_to_cart_starters'])){


   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];


   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE (name = '$product_name' AND table_number ='$name_')");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, prise, image, quantity,table_number, is_confirmed) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$name_',0)");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>


<div class="container">

<section class="products">

   <h1 class="heading">Starters</h1>

   
    <?php
   // $name__=$_SESSION["nam"];
   // echo 'welcome'.$name__;
   // echo $_GET['nam'];
   ?> 


   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `starters`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post" class="hover">
         <div class="box">
            <img src="image/<?php echo $fetch_product['image']; ?>" alt="" width="280px" height="200px" >
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">&#8377;<?php echo $fetch_product['prise']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['prise']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart_starters">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>
<div class="container">

<section class="products">

   <h1 class="heading">Main Course</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `main_course`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="image/<?php echo $fetch_product['image']; ?>" alt="" width="280px" height="200px">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">&#8377;<?php echo $fetch_product['prise']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['prise']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart_Main_Course">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>



</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>