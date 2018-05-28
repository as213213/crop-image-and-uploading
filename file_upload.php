
<?php

    include('ConnectionDb.php');
   include('cropng_img.php');
    $c_img=new Image_Crop;
  if(isset($_POST['add']))
	{
      
      
      $path = "photos";
		
       $fileArray=$_FILES['image_upload'];
	if(!empty($fileArray['name']) && $fileArray['error'] == 0){
            
	$getFileExtension = pathinfo($fileArray['name'], PATHINFO_EXTENSION);
        
    if(($getFileExtension =='jpg') || ($getFileExtension =='jpeg') || ($getFileExtension =='png') || ($getFileExtension =='gif')){
		if ($fileArray["size"] <= 1000000) {
          
                    
    $newFileName				=	$fileArray['name'];
                         
   $breakImgName = explode(".",$newFileName);
   $imageOldNameWithOutExt = $breakImgName[0];
   $imageOldExt = $breakImgName[1];
   $newFileName = strtotime("now")."-".str_replace(" ","-",strtolower($imageOldNameWithOutExt)).".".$imageOldExt;             
               
   $targetPath = $path."/".$newFileName;  
                
		
		if (move_uploaded_file($fileArray["tmp_name"],$targetPath)) {
                 $c_img->crop_img($newFileName,$targetPath, 900, 450);
               
            $ins_query="INSERT INTO `home`(`home_img`) VALUES ('$targetPath')";  
                   mysqli_query($con,$ins_query);   
            
          } 
         }
       }
      }
    }
    ?>