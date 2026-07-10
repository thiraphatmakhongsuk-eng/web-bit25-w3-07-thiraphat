<?php
    // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include 'action/connect.php';

    // join กับ game_type เพื่อเอาชื่อประเภทมาแปะเป็น badge บนปกเกม
    $sql = "SELECT g.*, t.type_name
            FROM games g
            LEFT JOIN game_types t ON g.type_id = t.type_id
            ORDER BY g.game_id";
    $result = mysqli_query($con, $sql);

    // แปลงชื่อประเภทเป็น class สำหรับสี badge เช่น "BATTLE ROYALE" -> "battle-royale"
    function type_slug($name) {
        return strtolower(str_replace(' ', '-', trim($name ?? '')));
    }
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>GAME.SHOP — รายการเกมทั้งหมด</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <nav class="marquee">
        <div class="marquee-logo">GAME<span>.SHOP</span></div>
        <div class="marquee-tabs">
            <a href="index.php" class="active">รายการเกม</a>
            <a href="game_type.php">ประเภทเกม</a>
        </div>
    </nav>

    <main class="page">
        <p class="page-eyebrow">คลังเกมทั้งหมด</p>
        <h1 class="page-title">รายการเกม</h1>
        <p class="page-sub">เกมทุกเรื่องบนชั้น พร้อมประเภทและราคา</p>

        <?php if (mysqli_num_rows($result) === 0): ?>
            <div class="empty">ยังไม่มีเกมในระบบ</div>
        <?php else: ?>
            <table class="shop-table">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ปก</th>
                        <th>ชื่อเกม</th>
                        <th>ประเภท</th>
                        <th style="text-align:right">ราคา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $game):
                        $slug = type_slug($game['type_name']);
                    ?>
                    <tr>
                        <td class="cell-id">#<?= htmlspecialchars($game['game_id']) ?></td>
                        <td><img class="cover-thumb" src="<?= htmlspecialchars($game['game_cover']) ?>" alt="<?= htmlspecialchars($game['game_name']) ?>"></td>
                        <td><?= htmlspecialchars($game['game_name']) ?></td>
                        <td>
                            <?php if (!empty($game['type_name'])): ?>
                                <span class="badge <?= htmlspecialchars($slug) ?>"><?= htmlspecialchars($game['type_name']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="cell-price">฿<?= number_format((float) $game['game_price'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

</body>
</html>
