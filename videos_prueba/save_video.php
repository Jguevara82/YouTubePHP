<?php
	date_default_timezone_set('America/Mexico_City');
	require_once 'conexion.php';
	
	if(ISSET($_POST['save'])){
		$file_name = $_FILES['video']['name'];
		$file_temp = $_FILES['video']['tmp_name'];
		$file_size = $_FILES['video']['size'];
		$descripcion=$_POST['descripcion'];	
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();
				$location = 'video/'.$name.".".$end;
				if(move_uploaded_file($file_temp, $location)){
					mysqli_query($connection, "INSERT INTO `video` VALUES('', '$name', '$location', '$descripcion')") or die(mysqli_error());
					echo "<script>alert('Video Uploaded')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}else{
				echo "<script>alert('Wrong video format')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		}else{
			echo "<script>alert('File too large to upload')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
	}
?>