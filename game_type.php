
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ร้านเกม - ประเภทเกม</title>
    <style>
        body {
            font-family: "Tahoma", sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #2c3e50;
            padding: 15px 20px;
            text-align: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #f1c40f;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 20px;
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <?php
        // Report all PHP errors
        error_reporting(E_ALL);

        // Force errors to be displayed on the screen
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        include 'action/connect.php';

        $sql = "SELECT * FROM game_types";
        $result = mysqli_query($con, $sql);
    ?>

    <div class="navbar">
        <a href="index.php">รายการเกม</a>
        <a href="game_type.php">ประเภทเกม</a>
        <a href="manage_game.php">จัดการเกม</a>
        <a href="add_game.php">เพิ่มเกม</a>
    </div>

    <h1>ประเภทเกมทั้งหมด</h1>

    <table>
        <thead>
            <tr>
                <th>รหัสประเภท</th>
                <th>ชื่อประเภท</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $type) { ?>
            <tr>
                <td><?= $type["type_id"] ?></td>
                <td><?= $type["type_name"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
