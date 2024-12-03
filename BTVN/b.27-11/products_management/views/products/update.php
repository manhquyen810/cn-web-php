<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Update</title>
    <style>
        body, h1, form, label, input, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }


        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 30px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        form input:focus {
            border-color: #007bff;
            outline: none;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        form button:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 1.2em;
            color: #555;
            text-align: center;
        }

    </style>
</head>
<body>
<h1>Cập nhật sản phẩm</h1>
<?php
if (isset($product)) : ?>
    <form method="POST" action="">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>

        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required><br>

        <button type="submit">Cập nhật</button>
    </form>
<?php else: ?>
    <p>Không có sản phẩm để cập nhật.</p>
<?php endif; ?>


</body>
</html>