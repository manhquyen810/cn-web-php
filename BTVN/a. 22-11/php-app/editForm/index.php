<?php
session_start();


if (isset($_GET['id'])) {
    $editId = (int)$_GET['id'];
    $productToEdit = null;
    foreach ($_SESSION['products'] as $product) {
        if ($product['id'] === $editId) {
            $productToEdit = $product;
            break;
        }
    }
    if (!$productToEdit) {
        header("Location: ../main/index.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $name = htmlspecialchars($_POST['name']);
    $price = (int)$_POST['price'];
    foreach ($_SESSION['products'] as &$product) {
        if ($product['id'] === $editId) {
            $product['name'] = $name;
            $product['price'] = $price;
            break;
        }
    }
    header("Location: ../main/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }

    </style>
    </style>
</head>
<body>
<?php include '../header/index.php';?>
<div class="container">
    <h2>Sửa sản phẩm</h2>
    <form method="post">
        <input type="text" name="name" value="<?= htmlspecialchars($productToEdit['name']) ?>" placeholder="Tên sản phẩm" required>
        <input type="number" name="price" value="<?= $productToEdit['price'] ?>" placeholder="Giá thành" required>
        <button type="submit" name="edit" class="btn">Lưu</button>
    </form>
</div>
<?php include '../footer/index.php';?>
</body>
</html>

