<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Starters</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: url(image/bg.webp) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            padding: 20px;
        }

        .name {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
            color: aqua;
            font-size: 28px;
            font-weight: bold;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .add_button {
            text-align: center;
            margin-bottom: 20px;
        }

        .add_button a {
            background-color: #0077b6;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .add_button a:hover {
            background-color: #023e8a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #222;
            color: #fff;
            font-size: 18px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .action-buttons button {
            margin: 5px;
        }

        .action-buttons a {
            background-color: #198754;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .action-buttons a:hover {
            background-color: #14532d;
        }

        .action-buttons a.delete {
            background-color: #dc3545;
        }

        .action-buttons a.delete:hover {
            background-color: #a4161a;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 20px;
                border-bottom: 2px solid #eee;
            }

            th {
                text-align: left;
                background-color: transparent;
                color: #333;
                font-size: 16px;
                border-bottom: none;
            }

            td {
                text-align: left;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                position: absolute;
                left: 10px;
                top: 14px;
                font-weight: bold;
            }

            td:nth-of-type(1)::before { content: "Image"; }
            td:nth-of-type(2)::before { content: "Name"; }
            td:nth-of-type(3)::before { content: "Price"; }
            td:nth-of-type(4)::before { content: "Operation"; }
        }
    </style>
</head>
<body>

<div class="name">Foodies - Starters Menu</div>

<div class="add_button">
    <a href="http://localhost/restaurant/admin_menu_add_starters.php">➕ Add STARTERS</a>
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
        $sql = "SELECT * FROM `starters`";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $prise = $row['prise'];
                $image = $row['image'];

                echo '
                <tr>
                    <td><img src="image/' . $image . '" alt="' . $name . '"></td>
                    <td>' . $name . '</td>
                    <td>&#8377;' . $prise . '</td>
                    <td class="action-buttons">
                        <a href="admin_menu_update.php?updateid=' . $id . '">✏️ Update</a>
                        <a href="admin_menu_delete.php?deleteid=' . $id . '" class="delete">🗑️ Delete</a>
                    </td>
                </tr>';
            }
        }
        ?>
    </tbody>
</table>

</body>
</html>
