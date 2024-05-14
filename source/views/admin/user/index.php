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
background: #black;
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
function deleteUserValue(email, img){
	$("#DeleteUserModal input[name='email']").val(email);
	$("#DeleteUserModal input[name='img']").val(img);
    $('#DeleteUserModal').modal('show');
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
<h2>User <b>Management</b></h2>
</div>
<div class="col-sm-7">
<!-- Modal-->
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal"><i class="material-icons"></i> <span>Add New User</span></button>
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Add New User</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=add" enctype="multipart/form-data" method="post">
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<p class="text-dark">Last name</p>
															<input class="form-control" type="text" placeholder="Last name" name="fname" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<p class="text-dark">First name</p>
															<input class="form-control" type="text" placeholder="First name" name="lname" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<p class="text-dark">Age</p>
															<input class="form-control" type="number" placeholder="Age" name="age" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="text-dark">Gender:</p>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="1" />
																		<p class="text-dark">Male</p>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="0" />
																		<p class="text-dark">Female</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<p class="text-dark">Phone number</p>
													<input class="form-control" type="number" placeholder="Phone number" name="phone" />
												</div>

												<div class="form-group">
													<p class="text-dark">Email</p>
													<input class="form-control" type="text" placeholder="Email" name="email" />
												</div>

												<div class="form-group">
													<p class="text-dark">Password</p>
													<input class="form-control" type="password" placeholder="Password" name="password" />
												</div>
												<div class="form-group">
													<p class="text-dark">Image</p>&nbsp
													<input type="file" name="fileToUpload" id="fileToUpload" />
												</div>

											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
												<button class="btn btn-primary" type="submit">Add</button>
											</div>
										</form>
									</div>
								</div>
							</div>
</div>

<table class="table table-striped table-hover table-light mt-4">
<thead>
<tr>
<th>ID</th>
<th>Email</th>
<th>Photo</th>
<th>Fname</th>
<th>Lname</th>
<th>Gender</th>
<th>Age</th>
<th>Phone</th>
<th>Create at</th>
<th>Action</th>
</tr>
</thead>
<tbody>
									<?php
									$index = 1;
									foreach ($user as $value) {
										echo "<tr>";
										echo "<td>" . $index++ . "</td>";
										echo "<td>" . $value->email . "</td>";
										echo "<td><img style=\"width: 50px; height:50px;\" src='$value->profile_photo'></td>";
										echo "<td>" . $value->fname . "</td>";
										echo "<td>" . $value->lname . "</td>";
										echo "<td>" . (($value->gender == 1) ? "Nam" : "Nữ") . "</td>";
										echo "<td>" . $value->age . "</td>";
										echo "<td>" . $value->phone . "</td>";
										echo "<td>" . date('m/d/Y H:i:s', strtotime($value->createAt)) . "</td>";
										echo "<td>
										<button type='button'  data-toggle='modal' onclick='deleteUserValue(this.getAttribute(`data-email`),this.getAttribute(`data-img`))' class='settings border-0 bg-transparent' data-target='#DeleteUserModal' data-email='$value->email' data-img='$value->profile_photo'><i class='material-icons' style='color: black'></i></button>
										</td>";
										echo "</tr>";
									}
									?>
</tbody>
</table>
<div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content bg-light">
										<div class="modal-header">
											<h5 class="modal-title">Delete</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=delete" method="post">
											<div class="modal-body">
												<input type="hidden" name="email" />
												<input type="hidden" name="img" />
												<p>Are you sure to delete this user?</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Close</button>
												<button class="btn btn-danger btn-outline-light" type="submit">Confirm</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							</div>
<div class="clearfix">
<div class="hint-text text-dark">Total: <b><?php echo count($user) ?></b> rows</div>
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