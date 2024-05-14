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
function deleteCommentValue(id){
	$("#DeleteCommentModal input[name='id']").val(id);
    $('#DeleteCommentModal').modal('show');
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
<h2>Comment <b>Management</b></h2>
</div>
<div class="col-sm-7">
<!-- Modal-->
</div>
</div>
</div>
<table class="table table-striped table-hover table-light">
<thead>
<tr>
<th>ID</th>
<th>Date</th>
<th>Approved</th>
<th>Content</th>
<th>News_id</th>
<th>User_id</th>
<th>Action</th>
</tr>
</thead>
<tbody>

									<?php
									foreach ($comments as $value) {
										echo "<tr>";
										echo "<td>" . $value->id . "</td>";
										echo "<td>" . $value->date. "</td>";
										echo "<td>" . $value->approved . "</td>";
										echo "<td>" . $value->content . "</td>";
										echo "<td>" . $value->news_id . "</td>";
										echo "<td>" . $value->user_id . "</td>";
										echo "<td>
										<button type='button'  data-toggle='modal' onclick='deleteCommentValue(this.getAttribute(`data-id`))' class='settings border-0 bg-transparent' data-target='#DeleteCommentModal' data-id='$value->id'><i class='material-icons' style='color: black'></i></button>
										</td>";
										echo "</tr>";
									}
									?>
</tbody>
</table>
							<div class="modal fade" id="DeleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="DeleteCommentModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form action="index.php?page=admin&controller=comments&action=delete" method="post">
                                                        <div class="modal-body"><input type="hidden" name="id" />
                                                            <p>Are you sure to delete comment?</p>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-danger btn-outline-light" type="submit">Confirm</button></div>
                                                    </form>
                                                </div>
                                            </div>
                            </div>

<div class="clearfix">
<div class="hint-text">Total: <b><?php echo count($comments) ?></b> rows</div>
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