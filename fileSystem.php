<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head><title>User File Directory</title></head>
<body>

////////////////////totally using sprintf to create a dynamic html page
////////////////////according to the different conditions the apache will generate different html codes


//////sprintf is really very useful!! as long as you want to create a formatted string with variables
 ------------>>>>> >>>>
 <?php 
//  The <br> break tag is an empty tag which means that it has no end tag.
   $full_path = sprintf("/home/hu.yilong/uploads/%s/%s", $username, $filename);
   we need to embed the php variables into the string -> cannot just use + or . we use sprintf
   $full_path = sprintf("/home/hu.yilong/uploads/%s/%s", $_SESSION['username'], $_POST['info']);

if(isset($_POST['open'])){
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $mime = $finfo->file($full_path);
  header("Content-Type: ".$mime);
  readfile($full_path);
}else if(isset($_POST['delete'])){
    unlink($full_path);
  header("Location: file.php");
}else{
  header("Location: file.php");
}
?>
 -----------------------------------------------------
 <?php
 // Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);

//different from using regex in python 
//in php it is that easy to use by      /  .....regex ..... /

//if( !preg_match('/^[\w_\.\-]+$/', $filename) )
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
  echo "Invalid filename";
  exit;
}
?>
------------------------------------------------------


<?php
   printf("<p> Hello %s, here are your files</p>", htmlentities($_SESSION['username']));
   //scanning the name of file in a given dir path
   $filenames = scandir(sprintf("/home/hu.yilong/uploads/%s", $_SESSION['username']));
   $filenum = count($filenames);
   printf("<ul>");
   
   for($i=0; $i<$filenum; $i++){
       if($filenames[$i]!="." && $filenames[$i]!=".."){
           $currFile = $filenames[$i];
	       echo sprintf('<form action="processFile.php" method="POST"> 
	               <input type="hidden" value= %s name="info" />
	               <li><label for="file"> %s </label>
	                  <input type="submit" name="open" id="file" value="open" />
	                  <input type="submit" name="delete" id="file" value="delete" />
	               </li>
                </form>',
                 htmlentities($currFile), htmlentities($currFile));
        }
   }
   printf("</ul>");
   
   echo sprintf('<h3>File Upload</h3><br />
           Select a file to upload: <br />
           <form enctype="multipart/form-data" action="upload.php" method="POST">
	         <p>
		         <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		         <label for="upload">Choose a file to upload:</label> 
		         <input name="uploadedfile" type="file" id="upload" />
	        </p>
	        <p>
		       <input type="submit" value="Upload" />
	       </p>
           </form>');
           
   echo sprintf('<a href="person.php">Back</a>
                 <br />
                 <form action="validate.php" method="POST">
					<p>
						<input type="submit" value = "logout"/>
					</p>
                </form>
                <br />'); 

?>