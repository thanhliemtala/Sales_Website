<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		header("Location: index.php?page=admin&controller=login&action=index");
	}
	if($_SESSION["user"] != "admin") {
		header("Location: index.php?page=admin&controller=home&action=index");
	}
?>
<?php
	require_once('models/admin.php');
	require_once('views/admin/basic_layouts.php');
?>
<style>
body {
color: #566787;
background: #f5f5f5;
font-family: 'Varela Round', sans-serif;
font-size: 13px;
}
.table-responsive {
margin: 30px 0;
}
.table-wrapper {
min-width: 1000px;
background: #fff;
padding: 20px 25px;
border-radius: 3px;
box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
padding-bottom: 15px;
background: black;
color: #fff;
padding: 16px 30px;
margin: -20px -25px 10px;
border-radius: 3px 3px 0 0;
}
.table-title h2 {
margin: 5px 0 0;
font-size: 24px;
}
.table-title .btn {
color: #fff;
float: right;
font-size: 13px;
background: #000;
border: none;
min-width: 50px;
border-radius: 2px;
border: none;
outline: none !important;
margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
color: #566787;
background: #f2f2f2;
}
.table-title .btn i {
float: left;
font-size: 21px;
margin-right: 5px;
}
.table-title .btn span {
float: left;
margin-top: 2px;
}
table.table tr th, table.table tr td {
border-color: #e9e9e9;
padding: 12px 15px;
vertical-align: middle;
}
table.table tr th:first-child {
width: 60px;
}
table.table tr th:last-child {
width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
background: #000;
}
table.table th i {
font-size: 13px;
margin: 0 5px;
cursor: pointer;
}
table.table td:last-child i {
opacity: 0.9;
font-size: 22px;
margin: 0;
}
table.table td a {
font-weight: bold;
color: #566787;
display: inline-block;
text-decoration: none;
}
table.table td a:hover {
color: black;
}
table.table td a.settings {
color: black;
}
table.table td a.delete {
color: black;
}
table.table td i {
font-size: 19px;
}
table.table .avatar {
border-radius: 50%;
vertical-align: middle;
margin-right: 10px;
}
.status {
font-size: 30px;
margin: 2px 2px 0 0;
display: inline-block;
vertical-align: middle;
line-height: 10px;
}
.text-success {
color: #10c469;
}
.text-info {
color: #62c9e8;
}
.text-warning {
color: #FFC107;
}
.text-danger {
color: #ff5b5b;
}
.pagination {
float: right;
margin: 0 0 5px;
}
.pagination li a {
border: none;
font-size: 13px;
min-width: 30px;
min-height: 30px;
color: #999;
margin: 0 2px;
line-height: 30px;
border-radius: 2px !important;
text-align: center;
padding: 0 6px;
}
.pagination li a:hover {
color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
background: black;
color: white;
}
.pagination li.active a:hover {
background: black;
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
margin-top: 10px;
font-size: 13px;
}
.table-hover tbody tr:hover td {
    background: #ecf0f1;
}
.page-item.active .page-link {
	border-color: grey;
}
.page-link:active {
	border-color:grey;
}
</style>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
$("#tab-admin")
    .DataTable({
        // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
        },
    })
function editNewsValue(id){
	$("#EditNewsModal input[name='id']").val(id);
    $('#EditNewsModal').modal('show');
}
function deleteNewsValue(id){
	$("#DeleteNewsModal input[name='id']").val(id);
    $('#DeleteNewsModal').modal('show');
}
</script>
</head>
<body>
<div class="content-wrapper">
<div class="table-responsive">
<div class="table-wrapper">
<div class="table-title">
<div class="row">
<div class="col-sm-5">
<h2>News <b>Management</b></h2>
</div>
<div class="col-sm-7">
<!-- Modal-->
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal">Add New Blog</button>
                            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Blog</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=news&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                            <div class="form-group"><p class="text-dark">Title</p><input class="form-control" type="text" placeholder="Title" name="title" /></div>
                                                <div class="form-group"> <p class="text-dark">Description</p> <textarea class="form-control" placeholder="Description" name="description" rows="5"></textarea></div>
                                                <div class="form-group"> <p class="text-dark">Content</p> <textarea class="form-control" placeholder="Content" name="content" rows="10"></textarea></div>
                                                
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Add</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
</div>
</div>
</div>
<table class="table table-striped table-hover table-light">
<thead>
<tr>
<th>ID</th>
<th>Status</th>
<th>Date</th>
<th>Title</th>
<th>Description</th>
<th>Content</th>
<th>Action</th>
</tr>
</thead>
<tbody>

									<?php
									$index = 1;
									foreach ($news as $value) {
										echo "<tr>";
										echo "<td>" . $value->id . "</td>";
										echo "<td>" . $value->status . "</td>";
										echo "<td>" . date('m/d/Y H:i:s', strtotime($value->date)) . "</td>";
                                        echo "<td>" . $value->title . "</td>";
                                        echo "<td>" . $value->description . "</td>";
                                        echo "<td>" . $value->content . "</td>";
										echo "<td>
										<button type='button' data-toggle='modal' onclick='editNewsValue(this.getAttribute(`data-id`))' class='settings border-0 bg-transparent' data-id='$value->id' data-target='#EditNewsModal'><i class='material-icons' style='color: black'></i></button>
										<button type='button' data-toggle='modal' onclick='deleteNewsValue(this.getAttribute(`data-id`))' class='settings border-0 bg-transparent' data-id='$value->id' data-target='#DeleteNewsModal'><i class='material-icons' style='color: black'></i></button>
										</td>";
										echo "</tr>";
									}
									?>
</tbody>
</table>
                                <div class="modal fade" id="EditNewsModal" tabindex="-1" role="dialog" aria-labelledby="EditNewsModal" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit blog</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=news&action=edit" enctype="multipart/form-data" method="post">
                                                <div class="modal-body">
                                                    <input class="form-control" type="hidden" placeholder="Name" name="id" />
                                                    <div class="form-group"><label>Title </label><input class="form-control" type="text" name="title" /></div>
                                                    <div class="form-group"> <label>Description</label> <textarea class="form-control" name="description" rows="5"></textarea></div>
                                                    <div class="form-group"> <label>Content</label> <textarea class="form-control" name="content" rows="10"></textarea></div>

                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Edit</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

							<div class="modal fade" id="DeleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="DeleteNewsModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content bg-light">
										<div class="modal-header">
											<h5 class="modal-title">Delete</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=news&action=delete" method="post">
											<div class="modal-body">
												<input type="hidden" name="id" />
												<p>Are you sure to delete this news?</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Close</button>
												<button class="btn btn-danger btn-outline-light" type="submit">Confirm</button>
											</div>
										</form>
									</div>
								</div>
							</div>

<div class="clearfix">
<div class="hint-text">Total: <b><?php echo count($news) ?></b> rows</div>
<ul class="pagination">
<li class="page-item disabled"><a href="#">Previous</a></li>
<li class="page-item"><a href="#" class="page-link">1</a></li>
<li class="page-item"><a href="#" class="page-link">2</a></li>
<li class="page-item active"><a href="#" class="page-link">3</a></li>
<li class="page-item"><a href="#" class="page-link">4</a></li>
<li class="page-item"><a href="#" class="page-link">5</a></li>
<li class="page-item"><a href="#" class="page-link">Next</a></li>
</ul>
</div>
</div>
</div>


</div>
<script type="text/javascript"></script>
<script src="public/js/admin/index.js"></script>
<?php
require_once("views/admin/footer.php"); ?>