<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>


	<form id="frm_add" name="add" method="post" action="add.php?action=add" enctype="multipart/form-data">
		...
		<input type="submit" name="add" id="add" value="ADD">
	</form>

	<script>
	$(function(){
		$("#data").submit(function(){

			var formData = new FormData(this);
			$.ajax({
				url: 'nn.php',
				type: 'POST',
				data: formData,
				async: false,
				success: function (data) {
					alert(data)
				},
				cache: false,
				contentType: false,
				processData: false
			});

			return false;
		});
	});
	</script>


	<form id="data" method="post" enctype="multipart/form-data">
		<input type="text" name="first" value="Bob" />
		<input type="text" name="middle" value="James" />
		<input type="text" name="last" value="Smith" />
		<input name="image" type="file" />
		<button>Submit</button>
	</form>
</body>
</html>