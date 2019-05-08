<?php  
if(isset($_FILES["file"]))
{ 
	 //You can validate the file type, size here. I left the code for you 
	 if ($_FILES["file"]["error"] > 0) 
	 { 
	   echo "Error: " . $_FILES["file"]["error"]; 
	 } 
	 else 
	 { 
	 
	  move_uploaded_file($_FILES["file"]["tmp_name"],'upload/'. $_FILES["file"]["name"]);   
	  echo "Uploaded File :".$_FILES["file"]["name"]; 
	 } 
} 

?>