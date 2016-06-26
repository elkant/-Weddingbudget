 <?php

     $target_dir = "./uploads/";
     $name = $_POST['name'];
     //print_r($_FILES);
	 $uploadOk = 1;
     $target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
     //echo basename($_FILES["file"]["name"]);
	 
	 
	 
	  $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
     //   echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	 
     // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	
	//return a json showing success message and file name 
	
	
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		//echo basename( $_FILES["fileToUpload"]["name"]);
		
		echo $json;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
