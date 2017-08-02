<!DOCTYPE html>
<html lang="en" ng-app="">
<head>
	<meta charset="utf-8">

	<!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
	<title> FOAA Rule Generator </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

	<script type="text/javascript">
	$(function () {
		$("#is_new_dataset").click(function () {
			if ($(this).is(":checked")) {
				$("#dataset_dropdown_div").hide();
				$("#new_dataset_div").show();
				$("#create_dataset_button").val("Create New Dataset");
			} else {
				$("#dataset_dropdown_div").show();
				$("#new_dataset_div").hide();
				$("#create_dataset_button").val("Update Dataset");
			}
		});
	});
	$(function() {

		$('#create_dataset-link').click(function(e) {
			$("#create_dataset-form").show();
			$("#update_dataset-form").hide();
			$('#update_dataset-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#update_dataset-link').click(function(e) {
			$("#update_dataset-form").show();
			$("#create_dataset-form").hide();
			$('#create_dataset-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});

	});
	</script>

</head> 
<style type="text/css">
.panel-default>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-default>.panel-heading a.active{
	color: #357ebd;
}
.table-name {
	background-color: #dddddd;
	font-weight: 800;
}
.btn-primary .badge {
	background-color: #428bca;
}
.datatype_dropdown {
	position: absolute;
	right: 0;
	top: 0;
	padding: 12px 16px 12px 16px;
}
</style>

<script>


	$(function(){
		$("#create_dataset-form").submit(function(){

			var formData = new FormData(this);
			$.ajax({
				url: 'file_upload.php',
				type: 'POST',
				data: formData,
				async: false,
				success: function (data) {
					$('#column_list').html(data);   //select the id and put the response in the html
				},
				cache: false,
				contentType: false,
				processData: false
			});

			return false;
		});
	});

</script>

<body>

	<div class="container-fluid" style="min-height: 100%;">
		<!-- list section -->
		<div class="col-md-2" style="border-right: 2px solid #cccccc;min-height:100vh;">
			<div class="col-md-12" style="background-color:#eeeeee;"><h4>list</h4></div>
		</div>
		<div class="col-md-10">
			<!-- navbar section --> 
			<div class="col-md-12" style="background-color:#eeeeee;">
				<h4>main content</h4>
			</div>
			<!-- first section -->
			<div class="col-md-5" style="background-color:#fff;margin-top:20px;margin-bottom:20px;" >
				<!-- Crete Dataset from File Panel -->
				<div class="panel panel-default" >
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6" style="border-right:2px solid #cccccc;">
								<center><a href="#" class="active" id="create_dataset-link">Create Dataset</a></center>
							</div>
							<div class="col-md-6">
								<center><a href="#" id="update_dataset-link">Update Dataset</a></center>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<!-- Create Dataset Form -->
						<form id="create_dataset-form" method="POST" action="" name="create_dataset-form" onsubmit="return false" enctype="multipart/form-data" role="form" style="display: block;">
							<div class="form-group">
								<input id="create_file_input" class="form-control" placeholder="Select a File from" name="create_file_input" type="file">
							</div>
							<div class=" form-group input-group input-group-sm col-md-12" id="new_dataset_div" >
								<span class="input-group-addon" id="sizing-addon1"> Dataset Name </span>
								<input class="form-control" placeholder="Provide a dataset name" name="new_dataset_name" type="text">
							</div>
							<input class="btn btn-sm btn-primary btn-block" type="submit" id="create_dataset_button" name="create_dataset_button" value="Create Dataset">
						</form>
						<!-- Update Dataset Form -->
						<form id="update_dataset-form" action="https://phpoll.com/login/process" method="post" role="form" style="display: none;">
							<div class="form-group">
								<input id="update_file_input" class="form-control" placeholder="Select a File from" name="update_file_input" type="file">
							</div>
							<div class="form-group input-group input-group-sm col-md-12" id="update_dataset_dropdown_div" >
								<span class="input-group-addon" id="sizing-addon1"> Dataset </span>
								<select type="text" class="form-control" placeholder="Select Table" id="update_dataset_dropdown" aria-describedby="sizing-addon1">
									<option>  </option>
									<option>abcd</option>
									<option>abcd2</option>
								</select>
							</div>
							<input class="btn btn-sm btn-primary btn-block" type="submit" id="update_dataset_button" name="update_dataset_button" value="Update Dataset">
						</form>
					</div>
				</div>
				<div class="" id="recent_datasets-div" >
					<div class="panel panel-default" >
						<div class="panel-heading">
							<center> <b> Recent Dataset </b> </center>
						</div>
						<ul class="list-group" id="recent_dataset-list">
							<li class="list-group-item">
								<a href="#" class="" id=""> OFA GLSL 20325 </a>
							</li>
							<li class="list-group-item">
								<a href="#" class="" id=""> OFA GLSL 20325 </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--  -->
			<div class="col-md-7" id="" style="background-color:#fff;margin-top:20px;margin-bottom:20px;">
				<div class="panel panel-default" id="column_list" >
					<div class="panel-heading">
						<center> <b> Dataset Name </b> </center>
					</div>
					<ul class="list-group" id="column_list_items" >
						<li class="list-group-item">
							column_name
							<span class="datatype_dropdown">
								<select>
									<option> String </option>
									<option> Integer </option>
									<option> Decimal </option>
									<option> Date </option>
									<option> Boolean </option>
								</select>
							</span>
						</li>
						<li class="list-group-item">
							column_name
							<span class="datatype_dropdown">
								<select>
									<option> String </option>
									<option> Integer </option>
									<option> Decimal </option>
									<option> Date </option>
									<option> Boolean </option>
								</select>
							</span>
						</li>
						<li class="list-group-item">
							column_name
							<span class="datatype_dropdown">
								<select>
									<option> String </option>
									<option> Integer </option>
									<option> Decimal </option>
									<option> Date </option>
									<option> Boolean </option>
								</select>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>