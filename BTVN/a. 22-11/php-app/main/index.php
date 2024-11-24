<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 1000],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 2000],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 3000],
    ];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = htmlspecialchars($_POST['name']);
    $price = (int)$_POST['price'];


    $newId = end($_SESSION['products'])['id'] + 1;


    $_SESSION['products'][] = ['id' => $newId, 'name' => $name, 'price' => $price];


    header("Location: ../main/index.php");
    exit();
}


if (isset($_GET['delete'])) {
    $deleteId = (int)$_GET['delete'];
    $_SESSION['products'] = array_filter($_SESSION['products'], fn($p) => $p['id'] !== $deleteId);
}


if (isset($_GET['edit'])) {
    header("Location: ../editForm/index.php?id=" . $_GET['edit']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link href="/node_modules/bootstrap-icons/font/bootstrap-icons.css"-->
    <!--          rel="stylesheet">-->
    <title>Administration</title>
    <style>
        .container {
            padding: 20px;
        }
        .btn-add {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f9f9f9;
        }
        .edit-icon, .delete-icon {
            cursor: pointer;
            color: blue;
        }
    </style>
</head>
<body>
<?php include '../header/index.php';?>
<main>

    <div class="container">
        <button class="btn-add"><a href="../addForm/index.php" style="color: white;
        text-decoration: none">Thêm
                mới</a></button>
        <table>
            <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá thành</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['products'] as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?> VND</td>
                    <td class="edit-icon">
                        <a href="../editForm/index.php?id=<?= $product['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24">
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                            </svg></a>
                    </td>
                    <td class="delete-icon">
                        <a href="?delete=<?= $product['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24">
                                <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                            </svg></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include '../footer/index.php';?>
</body>

