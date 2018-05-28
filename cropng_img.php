<?PHP
/**************************************************************************************
Author: S.M. Zamshed Farhan <zfprince@gmail.com>
LAST UPDATE: 2013-01-12
**************************************************************************************/
class Image_Crop
{
	
	function crop_img($new_name,$targetPath, $crop_width, $crop_height) {
	
		//if(copy($old_name, $new_name)) {
		$targetFolder1 = "photos";
           $new_file=basename($targetPath);  
           
			// READ WIDTH & HEIGHT OF ORIGINAL IMAGE
			list($current_width, $current_height) = getimagesize($targetFolder1."/".$new_file);
			
			// CENTER OF GIVEN IMAGE, WHERE WE WILL START THE CROPPING
			$left	=	($current_width / 2) - ($crop_width / 2);
			$top 	=	($current_height / 2) - ($crop_height / 2);
			
			// BUILD AN IMAGE WITH CROPPED PART
			$new_canvas = imagecreatetruecolor($crop_width, $crop_height);
			$new_image = imagecreatefromjpeg($targetFolder1."/".$new_file);
			imagecopy($new_canvas, $new_image, 0, 0, $left, $top, $current_width, $current_height);
                       
                        $targetPath = $targetFolder1."/".$new_name;
			imagejpeg($new_canvas, $targetPath, 100);
		
                
                        
                
                
		
		
		return true;
	}


}
?>