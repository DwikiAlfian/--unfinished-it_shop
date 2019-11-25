<?php
	include('koneksi.php');
	$fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;

	mysqli_query($con,"insert into foto (filename) values ('$location')");
	header('location:index.php');
?>
