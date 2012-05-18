<?php

/*
 * class MIMETYPES
 * @copyright Andros Romo
 * @author Andros Romo <@AndrosRomo>
 * @description Clase para obtener el MIME Type de un archivo en base a su extensi—n.
 * @thanks to Robert Widdick
 */

class MIMETYPES {
	
	/**
	  *  NOMBRE DEL ARCHIVO
	  *  @var $FILE
	  *  Requerido
	  */
	var $FILE;

	function __construct(){

		$this->file = $FILE;
		
		include_once('class.types.php');
		
		$this->types = $types;

	}
	
	/*
	 * function getMIMEType
	 * @access public
	 * @return true or false
	 */		
	public function getMIMEType(){
		
		$file = ( !empty($this->file) )?$this->file:false;
		
		if( $file ):
			
			$ext = $this->getFileExtension($file);
			
			$ext = $ext[extension];
			
			if( $this->types[$ext] ){
				
				$this->mimetype = $this->types[$ext];
				
				return true;	
				
			} else {
				
				$this->mimetype = "application/octet-stream";
				
				return true;
				
			}
			
		
		else:
			
			$this->msg = 'Incorrect filename';
			
			return false;
		
		endif;
		
	}
	
	
	/*
	 * function getFileExtension
	 * @param $file
	 * @access private
	 */	
	private function getFileExtension($file){
		
		preg_match_all("@(.*)(\.[a-z0-9]+)@i",$file, $out);
		
		$ext = preg_replace("@([^a-z0-9]+)@i","",$out[2][0]);

		$out = array_merge($out, array( "extension" => $ext ) );
		
		return $out;

	}
	
	
	/*
	 * function getFileName
	 * @param $path
	 * @access private
	 */	
	public function getFileName($path){
			
		if( strstr($path,"/") ):
			
		    preg_match_all("@(.*)/(.*)$@i",$path, $out);
			
		   $out = $out[2][0];
			
		else:
			
		    $out = $path;
			
		endif;
		
		
		preg_match_all('=^[^/?*;:{}\\\\]+\.[^/?*;:{}\\\\]+$=',$out,$out);
		
		$out = $out[0][0];
			
		return $out;
			
	}
	
	
}