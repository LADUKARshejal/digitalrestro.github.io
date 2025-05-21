<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $prise = $_POST['prise'];
    $img = $_POST['img'];

    $sql = "INSERT INTO `main_course` (name, prise, image) VALUES ('$name','$prise','$img')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Image inserted');</script>";
        header('location:admin_menu_display_main_course.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Main Course</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .name {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
            color: aqua;
            border-radius: 10px;
            margin: 20px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('image/bg.webp') no-repeat center center/cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            
            /* background-color: #f8f9fa; */
            /* font-family: Arial, sans-serif; */
            margin: 0;
            padding: 0;
        }
        

        .header {
            background-color: #000;
            color: aqua;
            padding: 1rem;
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            border-radius: 10px;
            margin: 1rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border: 4px solid purple;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            margin: auto;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container h2 {
            color: purple;
            margin-bottom: 1rem;
        }

        .form-container input,
        .form-container button {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-container input[type="file"] {
            padding: 0.4rem;
        }

        .form-container button {
            background-color: blueviolet;
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background-color: indigo;
        }

        @media (max-width: 600px) {
            .header {
                font-size: 1.2rem;
                padding: 0.8rem;
            }

            .form-container {
                padding: 1rem;
            }

            .form-container input,
            .form-container button {
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body>
    <!-- <div class="header">ADMIN'S CONSOLE</div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-container">
            <h2>MAIN COURSE</h2>
            <input type="text" name="name" placeholder="Enter Name" required>
            <input type="text" name="prise" placeholder="Enter Price" required>
            <input type="file" name="img" accept=".jpg, .jpeg, .png" required>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form> -->
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