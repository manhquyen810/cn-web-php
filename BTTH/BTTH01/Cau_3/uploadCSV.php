<?php
$filename = "KTPM2.csv";
$sinhvien = [];

// Mở file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }

    fclose($handle);
}

// In mảng sinh viên (chỉ để kiểm tra)
//print_r($sinhvien);
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Danh sách sinh viên</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Thành phố</th>
                <th>Email</th>
                <th>Khóa học</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị từng sinh viên
            foreach ($sinhvien as $sv) {
                echo "<tr>";
                echo "<td>" . ($sv['username'] ?? 'N/A') . "</td>";
                echo "<td>" . ($sv['password'] ?? 'N/A') . "</td>";
                echo "<td>" . ($sv['lastname'] ?? 'N/A') . "</td>";
                echo "<td>" . ($sv['firstname'] ?? 'N/A') . "</td>";
                echo "<td>" . ($sv['city'] ?? 'N/A') . "</td>";
                echo "<td>" . ($sv['email'] ?? 'N/A') . "</td>";
                echo "<td>" . ($sv['course1'] ?? 'N/A') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

