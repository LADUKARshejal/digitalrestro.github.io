<?php  
$name_='';  
@include 'config.php';  

if(isset($_GET['nam'])){
    $name_=$_GET['nam']; 
}; 

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
    echo "<script>
        alert('Item removed successfully!');
        window.location.assign('admin.php');
    </script>"; 
};      
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Foodies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(to right, #d9a7c7, #fffcdc);
            min-height: 100vh;
        }

        .name {
            background-color: #222;
            padding: 20px;
            text-align: center;
            color: #00f2ff;
            font-size: 28px;
            font-weight: bold;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 15px;
            gap: 20px;
        }

        .element {
            flex: 1 1 300px;
            background-color: #ffffffcc;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            min-height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .item {
            width: 100%;
        }

        .item button {
            background-color: #0077b6;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            margin: 10px 0;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        .item button:hover {
            background-color: #023e8a;
        }

        .item a {
            color: white;
            text-decoration: none;
            display: block;
            width: 100%;
        }

        .display {
            flex: 2 1 600px;
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow-y: auto;
            max-height: 80vh;
        }

        .display_order {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background-color: #212121;
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 15px;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        td img {
            border-radius: 10px;
            height: 80px;
            object-fit: cover;
        }

        .delete-btn {
            padding: 6px 10px;
            background-color: #e63946;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #d00000;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .element, .display {
                flex: 1 1 100%;
                min-height: auto;
            }

            .item button {
                font-size: 14px;
            }

            td img {
                height: 60px;
            }
        }
    </style>
</head>
<body>

    <div class="name">
        <h3>🍽️ Foodies Admin Panel</h3>
    </div>

    <div class="container">
        <!-- Left Panel -->
        <div class="element">
            <div class="item">
                <button>
                    <a href="http://localhost/restaurant/admin_menu_display_starters.php">Add / Delete / Update Starters</a>
                </button>
                <button>
                    <a href="http://localhost/restaurant/admin_menu_display_main_course.php">Add / Delete / Update Main Course</a>
                </button>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="display">
            <div class="display_order">
                <table>
                    <thead>
                        <tr>
                            <th>Table No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE is_confirmed = 1 ORDER BY table_number");
                        $grand_total = 0;
                        if(mysqli_num_rows($select_cart) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        ?>
                        <tr>
                            <td><?php echo $fetch_cart['table_number']; ?></td>
                            <td><img src="image/<?php echo $fetch_cart['image']; ?>" alt=""></td>
                            <td><?php echo $fetch_cart['name']; ?></td>
                            <td><?php echo $fetch_cart['quantity']; ?></td>
                            <td>&#8377;<?php echo $sub_total = number_format($fetch_cart['prise'] * $fetch_cart['quantity']); ?>/-</td>
                            <td>
                                <a href="admin.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn">
                                    <i class="fas fa-trash"></i> Remove
                                </a>
                            </td>
                        </tr>
                        <?php 
                            $grand_total += $sub_total;
                            }
                        } else {
                            echo "<tr><td colspan='6'>No confirmed orders yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
