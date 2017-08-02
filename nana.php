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

	/* $(function(){
		$("#create_dataset-form").submit(function(){

			var formData = new FormData(this);
			$.ajax({
				url: 'file_upload_latest.php',
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
	}); */

	$(function() {
		// Variable to hold request
		var request;

		// Bind to the submit event of our form
		$("#create_dataset-form").submit(function(event){

		    // Prevent default posting of form - put here to work in case of errors
		    event.preventDefault();

		    // Abort any pending request
		    if (request) {
		    	request.abort();
		    }
		    
		    // Let's select and cache all the fields
		    //var $inputs = $form.find("input, select, button, submit, textarea, file");

		    // Serialize the data in the form
		    //var serializedData = $form.serialize();

		    // Let's disable the inputs for the duration of the Ajax request.
		    // Note: we disable elements AFTER the form data has been serialized.
		    // Disabled form elements will not be serialized.
		    //$inputs.prop("disabled", true);
		    var form_data = new FormData(this);
    
		    /*data: new FormData($('#create_dataset-form')[0]),
		    xhr: function() {
            	var myXhr = $.ajaxSettings.xhr();
            	if (myXhr.upload) {
	                // For handling the progress of the upload
	                myXhr.upload.addEventListener('progress', function(e) {
	                    if (e.lengthComputable) {
	                        $('progress').attr({
	                            value: e.loaded,
	                            max: e.total,
	                        });
	                    }
	                } , false);
	            }
	            return myXhr;
	        },*/

		    // Fire off the request to /form.php
		    request = $.ajax({
		    	url: "file_upload.php",
		    	type: "POST",
		    	data: form_data, // point to server-side PHP script 
                //dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
				async: false,
                contentType: false,
                processData: false,
		    });

		    // Callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		        // Log a message to the console
		        console.log("Hooray, it worked!");
		    });

		    // Callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		        // Log the error to the console
		        console.error(
		        	"The following error occurred: "+
		        	textStatus, errorThrown
		        	);
		    });

		    // Callback handler that will be called regardless
		    // if the request failed or succeeded
		    request.always(function () {
		        // Reenable the inputs
		        $inputs.prop("disabled", false);
		    });
		    request.success(function (response, textStatus, jqXHR){
		    	$("#column_list").html(response);  
				 //select the id and put the response in the html
			});

		});
	});
*/
	</script>
</head>
<body>
	<form id="create_dataset-form" method="POST" name="create_dataset-form" enctype="multipart/form-data" role="form" style="display: block;">
		<div class="form-group">
			<input id="create_file_input" class="form-control" placeholder="Select a File from" name="create_file_input" type="file">
		</div>
		<div class=" form-group input-group input-group-sm col-md-12" id="new_dataset_div" >
			<span class="input-group-addon" id="sizing-addon1"> Dataset Name </span>
			<input class="form-control" placeholder="Provide a dataset name" name="new_dataset_name" type="text">
		</div>
		<input class="btn btn-sm btn-primary btn-block" type="submit" id="create_dataset_button" name="create_dataset_button" value="Create Dataset">
	</form>
	<progress></progress>
	<ul class="list-group" id="column_list" >
		sai
	</ul>

</body>
</html>