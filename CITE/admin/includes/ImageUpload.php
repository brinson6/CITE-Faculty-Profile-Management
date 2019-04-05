<?php
	class ImageUpload {
		public static function GetImageExtension($imagetype)
		{
			if(empty($imagetype)) return false;
		   
			switch($imagetype)
			{
				case 'image/bmp': return '.bmp';
				case 'image/gif': return '.gif';
				case 'image/jpg': return '.jpg';
				case 'image/jpeg': return '.jpeg';
				case 'image/png': return '.png';
				default: return false;
			}
		}
	}
?>