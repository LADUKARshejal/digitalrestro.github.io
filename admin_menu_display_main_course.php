<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .name {
            background-color: #212529;
            color: #f1c40f;
            height: 10vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            font-weight: bold;
            border-radius: 10px;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .add_button {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .add_button a {
            text-decoration: none;
            color: white;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .add_button a:hover {
            background-color: #218838;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: #007bff;
            color: white;
        }

        table th,
        table td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: center;
        }

        table img {
            border-radius: 10px;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        table button:hover {
            background-color: #0056b3;
        }

        table button a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="name">
        Foodies
    </div>

    <div class="add_button">
        <a href="http://localhost/restaurant/admin_menu_add_main_course.php">Add Main Course</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `main_course`";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['prise'];
                    $image = $row['image'];
                    echo '
                    <tr>
                        <td><img src="image/' . $image . '" alt="Food Image"></td>
                        <td>' . $name . '</td>
                        <td>&#8377;' . $price . '</td>
                        <td>
                            <button><a href="admin_menu_update_main_course.php?updateid=' . $id . '">Update</a></button>
                            <button><a href="admin_menu_delete_main_course.php?deleteid=' . $id . '">Delete</a></button>
                        </td>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>
