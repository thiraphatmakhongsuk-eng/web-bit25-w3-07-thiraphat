<?php
    // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include 'action/connect.php';

    // นับจำนวนเกมในแต่ละประเภทไปด้วยเลย ให้หน้านี้ดูมีข้อมูลจริง ไม่ใช่แค่ตารางเปล่า
    $sql = "SELECT t.type_id, t.type_name, COUNT(g.game_id) AS game_count
            FROM game_types t
            LEFT JOIN games g ON g.type_id = t.type_id
            GROUP BY t.type_id, t.type_name
            ORDER BY t.type_id";
    $result = mysqli_query($con, $sql);

    function type_slug($name) {
        return strtolower(str_replace(' ', '-', trim($name ?? '')));
    }
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>GAME.SHOP — ประเภทเกม</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <nav class="marquee">
        <div class="marquee-logo">GAME<span>.SHOP</span></div>
        <div class="marquee-tabs">
            <a href="index.php">รายการเกม</a>
            <a href="game_type.php" class="active">ประเภทเกม</a>
        </div>
    </nav>

    <main class="page">
        <p class="page-eyebrow">หมวดหมู่บนชั้นวาง</p>
        <h1 class="page-title">ประเภทเกม</h1>
        <p class="page-sub">แยกเกมตามแนวที่ชอบ พร้อมจำนวนเกมในแต่ละหมวด</p>

        <?php if (mysqli_num_rows($result) === 0): ?>
            <div class="empty">ยังไม่มีประเภทเกมในระบบ</div>
        <?php else: ?>
            <table class="shop-table">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ประเภท</th>
                        <th style="text-align:right">จำนวนเกม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $type):
                        $slug = type_slug($type['type_name']);
                    ?>
                    <tr>
                        <td class="cell-id">#<?= htmlspecialchars($type['type_id']) ?></td>
                        <td>
                            <span class="badge <?= htmlspecialchars($slug) ?>"><?= htmlspecialchars($type['type_name']) ?></span>
                        </td>
                        <td class="cell-count" style="--tint: var(--<?= htmlspecialchars($slug) ?>, var(--gold));"><?= (int) $type['game_count'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

</body>
</html>
