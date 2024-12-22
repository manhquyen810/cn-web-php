<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap 5 Simple Data Table</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Quản Lý <b>Người Dùng</b></h2></div>
                    <div class="col-sm-2">
    <a href="{{ route('users.create') }}" class="btn btn-info  d-flex  align-items-center">
        <i class="material-icons">add</i>
        <span>Thêm người dùng</span>
    </a>
</div>


                </div>
            </div>
            			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr> 
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="view" title="View"><i class="material-icons">visibility</i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="edit" title="Edit"><i class="material-icons">edit</i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="Delete">
        <i class="material-icons">delete</i>
    </button>
</form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
         <div class="clearfix">
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            <!-- First Page -->
            <li class="page-item {{ ($users->currentPage() == 1) ? 'disabled' : '' }}">
                <a href="{{ $users->url(1) }}" class="page-link">
                    <i class="material-icons">first_page</i>
                </a>
            </li>

            <!-- Previous Page -->
            <li class="page-item {{ ($users->onFirstPage()) ? 'disabled' : '' }}">
                <a href="{{ $users->previousPageUrl() }}" class="page-link">
                    <i class="material-icons">navigate_before</i>
                </a>
            </li>

            <!-- Page Number Links -->
            @for ($i = 1; $i <= $users->lastPage(); $i++)
                <li class="page-item {{ ($users->currentPage() == $i) ? 'active' : '' }}">
                    <a href="{{ $users->url($i) }}" class="page-link">{{ $i }}</a>
                </li>
            @endfor

            <!-- Next Page -->
            <li class="page-item {{ ($users->hasMorePages()) ? '' : 'disabled' }}">
                <a href="{{ $users->nextPageUrl() }}" class="page-link">
                    <i class="material-icons">navigate_next</i>
                </a>
            </li>

            <!-- Last Page -->
            <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? 'disabled' : '' }}">
                <a href="{{ $users->url($users->lastPage()) }}" class="page-link">
                    <i class="material-icons">last_page</i>
                </a>
            </li>
        </ul>
    </div>
</div>


        </div>
    </div>  
</div>   
</body>
</html>

