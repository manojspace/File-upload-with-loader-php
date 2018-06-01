<!DOCTYPE html>
<html>
<head>
	<title>File Upload with loader</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div>
		<form id="uploadForm" action="upload.php" method="post">
			<label>Upload Image File:</label>
			<input name="userImage" id="userImage" type="file" class="demoInputBox" />

			<div id="progress-div"><div id="progress-bar"></div></div>

			<div id="targetLayer"></div>
			<div><input type="submit" id="btnSubmit" value="Submit" class="btnSubmit" /></div>
			<div id="loader-icon" style="display:none;"><img src="images/LoaderIcon.gif" /></div>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/uploader.js"></script>

	<script type="text/javascript">
		$(document).ready(function() { 
			// Load the upload bar
			$('#uploadForm').submit(function(e) {	
				if($('#userImage').val()) {
					e.preventDefault();
					$('#loader-icon').show();
					$(this).ajaxSubmit({ 
						target:   '#targetLayer', beforeSubmit: function() {
							$("#progress-bar").width('0%');
						},uploadProgress: function (event, position, total, percentComplete){	
							$("#progress-bar").width(percentComplete + '%');
							$("#progress-bar").html('<div id="progress-status">' + 
								percentComplete +' %</div>')
						},success:function (){
							$('#loader-icon').hide();
						},resetForm: true 
					}); return false; 
				}
			});
		}); 
	</script>
</body>
</html>