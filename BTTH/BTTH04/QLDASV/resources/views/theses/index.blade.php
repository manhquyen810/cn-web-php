<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .table-wrapper {
    overflow-x: hidden;
}

</style>

</head>
<body>
<div class="container-xxl">
	<div class="table-responsive ">
		<div class="table-wrapper ">
			<div class="table-title mb-3 mt-3 ml-5">
				<div class="row d-flex align-items-center">
					<div class="col-sm-6 d-flex align-items-center">
						<h2 class="mb-0">Manage <b>Students</b></h2>
					</div>
					<div class="col-sm-2">
						<a href="{{ route('theses.create') }}" class="btn btn-success d-flex align-items-center justify-content-center">
							<i class="material-icons mr-2">&#xE147;</i>
							<span>Thêm đồ án mới</span>
						</a>
					</div>
				</div>
			</div>

			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Mã đồ án</th>
                        <th>Tên đồ án</th>
                        <th>Họ tên sinh viên</th>
                        <th>Chương trình học</th>
                        <th>GV hướng dẫn</th>
                        <th>Ngày nộp</th>
                        <th>Ngày bảo vệ</th>
                        <th>Hành động</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($theses as $thesis)
                        <tr>
                            <td>{{ $thesis->id }}</td>
                            <td>{{ $thesis->title }}</td>
                            <td>{{ $thesis->student->first_name }} {{ $thesis->student->last_name }}</td>
                            <td>{{ $thesis->program }}</td>
                            <td>{{ $thesis->supervisor }}</td>
                            <td>{{ $thesis->submission_date }}</td>
                            <td>{{ $thesis->defense_date }}</td>
                            <td>
                                <a href="{{ route('theses.edit', $thesis->id) }}" class="edit" title="Sửa" data-toggle="tooltip">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#deleteModal{{ $thesis->id }}" class="delete" title="Xóa" data-toggle="modal">
                                    <i class="material-icons">delete</i>
                                </a>

                                <div class="modal fade" id="deleteModal{{ $thesis->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $thesis->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $thesis->id }}">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa đồ án này không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="{{ route('theses.destroy', $thesis->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
			<div class="d-flex justify-content-center">
				{{ $theses->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>        
</div>

</body>
</html>