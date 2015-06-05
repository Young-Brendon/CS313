<?php
	
	error_reporting(E_ALL);
    ini_set("display_errors", 1);
	include 'lesson4/dbconnection.php';
	
	function processImage ($dir, $filename) {
	
		$dir = $dir . DIRECTORY_SEPARATOR;
		$i = strrpos($filename, '.');
		$image_name = substr($filename, 0, $i);
		$ext = substr($filename, $i);
		
		$image_path = $dir . DIRECTORY_SEPARATOR . $filename;
		
		$image_path_400 = $dir . $image_name . $ext;
		
		resize_image($image_path, $image_path_400, 400, 300);		
	}
	
	function resize_image($old_image_path, $new_image_path, $max_width, $max_height) {
	
		$image_info = getimagesize($old_image_path);
		$image_type = $image_info[2];
		
		switch($image_type) {
		
			case IMAGETYPE_JPEG:
				$image_from_file = 'imagecreatefromjpeg':;
				$image_to_file = 'imagejpeg';
				break;
				
			case IMAGETYPE_GIF:
				$image_from_file = 'imagecreatefromgif';
				$image_to_file = 'imagegif';
				break;
				
			case IMAGETYPE_PNG:
				$image_from_file = 'imagecreatefrompng';
				$image_to_file = 'imagepng';
				break;
				
			default:
				echo 'File must be a JPEG, GIF or PNG image.';
				exit;
		}
		
		$old_image = $image_from_file($old_image_path);
		$old_width = imagesx($old_image);
		$old_height = imagesy($old_image);
		
		$width_ratio = $old_width / $max_width;
		$height_ratio = $old_height / $max_height;
		
		if ($width_ratio > 1 || $height_ratio > 1) {
			$ratio = max($width_ratio, $height_ratio);
			$new_height = round($old_height / $ratio);
			$new_width = round($old_width / $ratio);
			
			$new_image = imagecreatetruecolor($new_width, $new_height);
			
			if ($image_type == IMAGETYPE_GIF) {
				$alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
				imagecolortransparent($new_image, $alpha);
			}
			
			if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
				imagealphablending($new_image, false);
				imagesavealpha($new_image, true);
			}
			
			$new_x = 0;
			$new_y = 0;
			$old_x = 0;
			$old_y = 0;
			imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
			
			$image_to_file($new_image, $new_image_path);
			
			imagedestroy($new_image);
		} else {
			$image_to_file($old_image, $new_image_path);
		}
		
		imagedestroy($old_image);		
	}
	
	require 'gallery.php';
	
	
?>