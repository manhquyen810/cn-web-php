<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<style>
    .table-wrapper {
    overflow-x: hidden;
}

</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
<div class="container-2xl">
	<div class="table-responsive ">
		<div class="table-wrapper ">
			<div class="table-title mb-3 mt-3 ">
				<div class="row d-flex align-items-center">
					<div class="col-sm-6 d-flex align-items-center">
						<h2 class="mb-0">Manage <b>Issues</b></h2>
					</div>
					<div class="col-sm-2">
						<a href="{{ route('issues.create') }}" class="btn btn-success d-flex align-items-center justify-content-center">
							<i class="material-icons mr-2">&#xE147;</i>
							<span>Thêm vấn đề mới</span>
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
						<th>Mã vấn đề</th>
                        <th>Tên máy tính</th>
                        <th>Tên phiên bản</th>
                        <th>Người báo cáo sự cố</th>
                        <th>Thời gian báo cáo</th>
						<th>Chi tiết vấn đề</th>
                        <th>Mức độ sự cố</th>
                        <th>Trạng thái hiện tại</th>
                        <th>Hành động</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->computer->computer_name }}</td>
                            <td>{{ $issue->computer->model }}</td>
                            <td>{{ $issue->reported_by }}</td>
                            <td>{{ $issue->reported_date }}</td>
							<td>{{ $issue->description }}</td>
                            <td>{{ $issue->urgency }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>
                                    <a href="{{ route('issues.edit', $issue->id) }}" class="edit" title="Sửa" data-toggle="tooltip">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#deleteModal{{ $issue->id }}" class="delete" title="Xóa" data-bs-toggle="modal">
                                    <i class="material-icons">delete</i>
                                </a>
<div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa vấn đề này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
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
				{{ $issues->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>        
</div>

</body>
</html>