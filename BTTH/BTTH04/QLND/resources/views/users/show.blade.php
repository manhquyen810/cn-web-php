<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông tin người dùng</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: #f8f9fa;
    }

    .user-info {
        margin-top: 50px;
    }

    .user-info .card {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .user-info .card-header {
        background-color: #007bff;
        color: white;
        font-size: 20px;
    }

    .user-info .card-body {
        padding: 30px;
    }

    .user-info .btn-back {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
    }

    .user-info .btn-back:hover {
        background-color: #0056b3;
    }
</style>
<body>

<div class="container user-info">
    <div class="card">
        <div class="card-header">
            Thông tin người dùng
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Họ và tên:</strong> {{ $user->name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Mật khẩu:</strong> ********** (Không hiển thị vì lý do bảo mật)</p>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('users.index') }}" class="btn btn-back">Quay lại danh sách người dùng</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
