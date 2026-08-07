<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านเกม - เพิ่มเกม</title>
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

        form {
            width: 400px;
            margin: 20px auto;
            background-color: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #2c3e50;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: "Tahoma", sans-serif;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="index.php">รายการเกม</a>
        <a href="game_type.php">ประเภทเกม</a>
        <a href="manage_game.php">จัดการเกม</a>
        <a href="add_game.php">เพิ่มเกม</a>
    </div>

    <h1>เพิ่มเกมใหม่</h1>

    <form action="action/insert_game.php" method="post">
        <label for="">รหัสเกม</label>
        <input type="text" name="game_id"> <br>

        <label for="">ชื่อเกม</label>
        <input type="text" name="game_name"> <br>

        <label for="">ราคา</label>
        <input type="number" name="game_price"> <br>

        <label for="">ลิงค์ภาพปก</label>
        <input type="text" name="game_cover"> <br>

        <?php
            include 'action/connect.php';

            $sql = "SELECT * FROM game_types";

            $result = mysqli_query($con, $sql);

        ?>

        <label for="">ประเภท</label>
        <select name="type_id" id="">
            <?php
                foreach($result as $type){
                    ?>
                        <option value="<?= $type["type_id"] ?>"> <?= $type["type_name"]?> </option>
                    <?php
                }

            ?>

        </select>

        <br>
        <button>บันทึก</button>

    </form>

</body>
</html>