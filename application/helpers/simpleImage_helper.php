<?php
 
/*
* File: SimpleImage.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 08/11/06
* Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details:
* http://www.gnu.org/licenses/gpl.html
*
*/
 

 
    $image;
    $image_type;
 
   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
   
   function getingriduserimage($fname,$location,$c=array('profileimg'),$bloc='uploadimage/')
	{
		$class=implode(' ',$c);
		if(isset($fname) && isset($location)){
		return '<img src="'.base_url().$bloc.$location.'/'.$fname.'" class="'.$class.'" alt="'.$fname.'" width="80" height="80">';
		}
		return '';
	}
  function postuserimage($fname,$location,$c=array('profileimg'),$bloc='uploadimage/')
	{
		$class=implode(' ',$c);
		if(isset($fname) && isset($location)){
		return '<img src="'.base_url().$bloc.$location.'/'.$fname.'" class="'.$class.'" alt="'.$fname.'" width="60" height="60">';
		}
		return '';
	}
  
  function commentuserimage($fname,$location,$c=array('profileimg'),$bloc='uploadimage/')
	{
		$class=implode(' ',$c);
		if(isset($fname) && isset($location)){
		return '<img src="'.base_url().$bloc.$location.'/'.$fname.'" class="'.$class.'" alt="'.$fname.'" width="50" height="50">';
		}
		return '';
	}
  function ucase($str,$uc=FALSE)
	{
		if($uc) return ucwords($str);
		return strtoupper($str);
	}
  function lcase($str=NULL)
	{
		if(isset($str)) return strtolower($str);
	} 
	
	function loadvideoframe($vfname,$dim=array('w'=>400,'h'=>300),$basedir='assets/video/')  {
		if(isset($vfname) && is_array($dim)){
			return  '<video controls="controls" poster="images/echo.jpg" width="'.$dim['w'].'" height="'.$dim['h'].'">
                                    <source src="'.base_url().$basedir.$vfname.'"  />
                                    <object type="application/x-shockwave-flash" data="images/flowplayer-3.2.16.swf" width="640" height="360">
                                        <param name="movie" value="images/flowplayer-3.2.16.swf" />
                                        <param name="allowFullScreen" value="true" />
                                        <param name="wmode" value="transparent" />
                                        <param name="flashVars" value="config={"playlist":["images/echo.jpg",
										{"url":"images/name.mp4",
										"autoPlay":false}]
										}" />
                                        <img alt="Big Buck Bunny" src="images/echo.jpg" width="640" height="360" title="No video playback capabilities, please download the video below" />
                                    </object>
                                </video>';
                     
			}
		 }
		 
		 
	function makedirempty($path=NULL){
		if(isset($path))
		{
			$files = glob($path); 
			foreach($files as $file){
			if(is_file($file))
			unlink($file);
			}return true;	
		}
			return false;
		}
	function createdir($name){
		if(!is_dir($name))
		{
			mkdir($name);
			return true;
		}
		return false;
	}
	
	
	function genrateingridurl($locations=array(),$seprator='/'){
			if(isset($location) && count($locations)>0 && is_array($locations))
			{
				return $url=implode($seprator,$locations);
			}
			return false;	
		}
		
	function movefile($name,$rename=NULL,$param=array('src'=>'assets/vtmp/video/','dest'=>'assets/video/')){
		
		if(is_null($rename))
		{
			$rename=$name;	
		}
		rename($param['src'].$name,$param['dest'].$rename);
		
		}
?>