<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: #555;
            margin: 10px 0;
        }

        a {
            display: inline-block;
            font-size: 1em;
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #e0e0e0;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #007bff;
            color: white;
        }


    </style>
</head>
<body>
<?php
if(isset($products)){
    echo "<h1>Product </h1>";
    echo "<p>Name: ".$products["name"]."</p>";
    echo "<p>Price: ".$products["price"]."</p>";
    echo "<a href='index.php'>Back</a>";
}
?>
</body>
</html>
