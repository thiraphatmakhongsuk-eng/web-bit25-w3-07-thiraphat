<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ร้านเกม - ปรับแต่ง</title>
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

        /* ปุ่มจัดการ */
        .btn {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            color: white;
            margin: 2px;
        }

        .btn-edit {
            background-color: #f1c40f;
            color: #2c3e50;
        }

        .btn-edit:hover {
            background-color: #d4ac0d;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include 'action/connect.php';

    $sql = "SELECT games.*, game_types.type_name
            FROM games
            JOIN game_types ON games.type_id = game_types.type_id";

    $result = mysqli_query($con, $sql);
?>

    <div class="navbar">
        <a href="index.php">รายการเกม</a>
        <a href="game_type.php">ประเภทเกม</a>
        <a href="manage_game.php">จัดการเกม</a>
        <a href="add_game.php">เพิ่มเกม</a>
    </div>

    <h1>จัดการเกมทั้งหมด</h1>

<table>
    <thead>
        <tr>
            <th>รหัสเกม</th>
            <th>ชื่อเกม</th>
            <th>ราคา</th>
            <th>ภาพปก</th>
            <th>ประเภท</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($result as $game){
    ?>
    <tr>
        <td> <?= $game["game_id"] ?> </td>
        <td> <?= $game["game_name"] ?> </td>
        <td class="price"> <?= $game["game_price"] ?> บาท</td>
        <td><img src="<?= $game["game_cover"] ?>"></td>
        <td><span class="type"><?= $game["type_name"] ?> </span></td>
        <td>
                <a class="btn btn-edit" href="edit_game.php?id=<?= $game['game_id'] ?>">แก้ไข</a>
                <a class="btn btn-delete" href="action/delete_game.php?id=<?= $game['game_id'] ?>">ลบ</a>
        </td>
    </tr>
<?php
}
?>
    </tbody>
</table>

</body>
</html>
