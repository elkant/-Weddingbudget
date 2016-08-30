 <?php

     $target_dir = "./uploads/";
     $name = $_POST['name'];
     //print_r($_FILES);
     $target_file = $target_dir . basename($_FILES["file"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	  $uploadOk = 1;
    // move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
 
     if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
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
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "GIF") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	// move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
	$newfilename = round(microtime(true)).$_FILES["file"]["name"];
	// if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $newfilename)) {
	
	
        echo  $newfilename;
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
