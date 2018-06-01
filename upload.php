<?php
// =============================================
// @author Manoj Kumar <manojswami600@gmail.com>
// =============================================
if(!empty($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
		$sourcePath = $_FILES['userImage']['tmp_name'];

		// Move file to upload folder
		$targetPath = "upload/".$_FILES['userImage']['name'];
		if(move_uploaded_file($sourcePath,$targetPath)) {
			exit();
		}
	}
}
?>