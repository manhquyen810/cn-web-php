<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <style>
        body{
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }
        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        p{
            color: #007bff;
        }
        a{
            padding: 10px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 20px;
        }
        a:hover{
            background: #0056b3;
            transition: .5s ease all;
        }


    </style>
</head>
<body>
<?php
if(isset($products)){
    echo "<h1>Product ". $products["name"]."</h1>";
    echo "<p>Name: ".$products["name"]."</p>";
    echo "<p>Price: ".$products["price"]."</p>";
    echo "<a href='index.php'>Back</a>";
}
?>
</body>
</html>
