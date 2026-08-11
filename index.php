
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ร้านเกม - รายการเกม</title>
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
            width: 90%;
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

        img {
            width: 100px;
            border-radius: 5px;
        }

        .price {
            color: #e67e22;
            font-weight: bold;
        }

        .type {
            background-color: #3498db;
            color: white;
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 13px;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 20px;
            font-size: 14px;
        }

        .footer a {
            color: #f1c40f;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
    <?php
        // Report all PHP errors
        error_reporting(E_ALL);

        // Force errors to be displayed on the screen
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        include 'action/connect.php';

        $sql = "SELECT games.*, game_types.type_name
                FROM games
                JOIN game_types ON games.type_id = game_types.type_id";

        $result = mysqli_query($con, $sql);
    ?>
</head>
<body>

    <div class="navbar">
        <a href="index.php">รายการเกม</a>
        <a href="game_type.php">ประเภทเกม</a>
        <a href="manage_game.php">จัดการเกม</a>
        <a href="add_game.php">เพิ่มเกม</a>
    </div>

    <h1>รายการเกมทั้งหมด</h1>

    <table>
        <thead>
            <tr>
                <th>รหัสเกม</th>
                <th>ชื่อเกม</th>
                <th>ราคา</th>
                <th>ภาพปก</th>
                <th>ประเภท</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $game) { ?>
            <tr>
                <td><?= $game["game_id"] ?></td>
                <td><?= $game["game_name"] ?></td>
                <td class="price"><?= $game["game_price"] ?> บาท</td>
                <td><img src="<?= $game["game_cover"] ?>"></td>
                <td><span class="type"><?= $game["type_name"] ?></span></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
<footer>
    <div class="footer">
        <p>&copy; <?= date("Y") ?> GAME SHOP. All Rights Reserved.</p>
        <p>จัดทำโดย <a href="#">นาย ธีรภัทร มะคงสุข BIT2/5</p>
    </div>
</footer>
</html>