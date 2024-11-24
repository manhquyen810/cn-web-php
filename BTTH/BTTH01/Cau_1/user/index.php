<?php
session_start();
$flowers = $_SESSION['flowers'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa</title>
    <style>
        .flower-list { display: flex;
            flex-direction: column;flex-wrap: wrap; gap: 20px; }
        .flower-item { border: 1px solid #ddd; padding: 10px; width: 100%; text-align: center; }
        .flower-item img { max-width: 100%; height: auto; }
        .flower-item h3, p{
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Danh sách các loài hoa</h1>
<div class="flower-list">
    <?php foreach ($flowers as $flower): ?>
        <div class="flower-item">
            <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>">
            <h3><?= $flower['name'] ?></h3>
            <p><?= $flower['description'] ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
