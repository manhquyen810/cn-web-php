<header>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #f4f4f4;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 30px;
        }
        .navbar h1 {
            margin: 0;
            font-size: 24px;
            color: black;
        }
        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .navbar ul li {
            display: inline;
        }
        .navbar ul li a {
            text-decoration: none;
            color: #808080;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
            padding: 5px;
        }
        .navbar ul li a:hover {
            color: #007BFF;
        }
        .navbar ul li a.the-loai {
            color: #000000;
            font-weight: bolder;
        }
    </style>
    <nav class="navbar">
        <h1>Administration</h1>
        <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Trang ngoài</a></li>
            <li><a href="#" class="the-loai">Thể loại</a></li>
            <li><a href="#">Tác giả</a></li>
            <li><a href="#">Bài viết</a></li>
        </ul>
    </nav>
</header>
