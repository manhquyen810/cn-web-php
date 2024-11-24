<?php
session_start();

//if (!is_dir('uploads')) {
//    mkdir('uploads', 0777, true);
//}

$flowers = $_SESSION['flowers'] ?? [];
$action = $_GET['action'] ?? '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Xử lý xóa hoa
if ($action === 'delete' && isset($id) && isset($flowers[$id])) {
    $imagePath = $flowers[$id]['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    unset($flowers[$id]);
    $_SESSION['flowers'] = array_values($flowers);
    header('Location: index.php');
    exit();
}

// Lấy thông tin hoa để sửa
$editFlower = null;
if ($action === 'edit' && isset($id) && isset($flowers[$id])) {
    $editFlower = $flowers[$id];
}

// Xử lý form khi thêm/sửa hoa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nameFlower'] ?? '';
    $description = $_POST['mtFlower'] ?? '';
    $editId = isset($_POST['edit_id']) ? (int)$_POST['edit_id'] : null;
    $imagePath = '';

    // Xử lý tệp ảnh (nếu có tải lên)
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
        $fileName = $_FILES['fileToUpload']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = uniqid() . '.' . $fileExtension;
            $imagePath = 'uploads/' . $newFileName;
            move_uploaded_file($fileTmpPath, $imagePath);
        }
    }

    // Xử lý sửa hoa
    if ($editId !== null && isset($flowers[$editId])) {
        $flowers[$editId]['name'] = $name;
        $flowers[$editId]['description'] = $description;
        if (!empty($imagePath)) {
            // Xóa ảnh cũ nếu có ảnh mới
            if (file_exists($flowers[$editId]['image'])) {
                unlink($flowers[$editId]['image']);
            }
            $flowers[$editId]['image'] = $imagePath;
        }
    } else {
        // Thêm hoa mới
        if (!empty($name) && !empty($description)) {
            $flowers[] = [
                'name' => $name,
                'description' => $description,
                'image' => $imagePath
            ];
        }
    }

    $_SESSION['flowers'] = $flowers;
    header('Location: index.php');
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hoa</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .action-icons {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="box">
        <h1>Quản trị hoa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Chọn ảnh:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <label for="nameFlower">Tên hoa:</label>
            <input type="text" name="nameFlower" id="nameFlower" value="<?= htmlspecialchars($editFlower['name'] ?? '') ?>" required>
            <label for="mtFlower">Mô tả:</label>
            <input type="text" name="mtFlower" id="mtFlower" value="<?= htmlspecialchars($editFlower['description'] ?? '') ?>" required>
            <input type="hidden" name="edit_id" value="<?= $id ?? '' ?>">
            <button class="add-btn" type="submit">Lưu</button>
        </form>
    </div>

    <table>
        <thead>
        <tr>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh hoa</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['flowers'] as $index => $flower): ?>
            <tr>
                <td><?= htmlspecialchars($flower['name']) ?></td>
                <td><?= htmlspecialchars($flower['description']) ?></td>
                <td>
                    <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" style="width: 100px; height: auto;">
                </td>
                <td class="action-icons">
                    <a href="?action=edit&id=<?= $index ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24">
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                        </svg></a>
                </td>
                <td class="action-icons">
                    <a href="?action=delete&id=<?= $index ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24">
                            <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                        </svg></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div
