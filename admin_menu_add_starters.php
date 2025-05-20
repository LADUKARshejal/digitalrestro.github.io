<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $prise = $_POST['prise'];
  $img = $_POST['img'];

  $sql = "INSERT INTO `starters` (name, prise, image) VALUES ('$name','$prise','$img')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "<script>alert('Image inserted');</script>";
    header('location:admin_menu_display_starters.php');
  } else {
    die(mysqli_error($con));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Starter</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: url(image/bg.webp) no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .name {
      background-color: rgba(0, 0, 0, 0.8);
      padding: 20px;
      text-align: center;
      color: aqua;
      border-radius: 10px;
      margin: 20px;
    }

    .form-container {
      max-width: 450px;
      margin: auto;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: purple;
    }

    input[type="text"],
    input[type="file"] {
      width: 100%;
      padding: 10px 15px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .btn {
      background-color: #7c3aed;
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      border-radius: 8px;
      font-size: 16px;
      margin-top: 15px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #5b21b6;
    }

    @media screen and (max-width: 600px) {
      .form-container {
        margin: 20px;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="name">
    <h1>ADMIN'S CONSOLE</h1>
  </div>

  <form method="post">
    <div class="form-container">
      <h2>Add Starter</h2>

      <input type="text" name="name" placeholder="Enter Name" required>
      <input type="text" name="prise" placeholder="Enter Price" required>
      
      <input type="file" name="img" id="" accept=".jpg, .jpeg, .png" placeholder="chose image" class="input">
      <button type="submit" name="submit" class="btn">Submit</button>
    </div>
  </form>

</body>
</html>
