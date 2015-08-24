<?php 

class HTMLBuilder {

	protected $header,
	 			$body,
	 			$footer;
	 	
	public function __construct($header, $body, $footer )
	 	{
	 		$this->header 	= 	$header;
	 		$this->body 	=	$body;
	 		$this->footer	=	$footer;
	 		// Creëer pagina automatisch
			$this->buildHTML();
	 	}

	public function buildHeader () {
		
		$page = $this;

		include_once 'HTML/'. $this->header;

	}


	public function buildBody () {
		include_once 'HTML/' . $this->body;
	}

	
	public function buildFooter () {
		include_once 'HTML/' . $this->footer;
			
	}

	public function buildHTML () {
		$this->buildHeader();
		$this->buildBody();
		$this->buildFooter();
	}


	public function createCssLinks(){

		//dirname = use it to get parent directory of current included file 
		$dirName = dirname(dirname(__FILE__));
		
		$cssDirName = $dirName . '\css';

		$allCssFilesArray = glob($cssDirName . '\*.css'); //volledige dir\alle_filename.css

		$allCssLinks	=	array();
		foreach ($allCssFilesArray as $file)
				{
					$fileInfo	=	pathinfo($file); //returned: dirname, basename, extension (if any), and filename.
					$fileName	=	$fileInfo['basename'];
					$volledigeNaam = $dirName."\\" .$fileName;
					$allCssLinks[] = $volledigeNaam;

				}
		return $allCssLinks;
	}

	public function getCssLinks(){
		$cssLinks = $this->createCssLinks();
		var_dump($cssLinks);
		return $cssLinks;
	}

	// public function createJsLinks(){

	// 	//dirname = use it to get parent directory of current included file 
	// 	$dirName = dirname(dirname(__FILE__));
	// 	$jsDirName = $dirName . '\js';
	// 	$allJsFilesArray = glob($jsDirName . '\*.js'); //volledige dir\filename

	// 	$dumpArray	=	array();
	// 	foreach ($allJsFilesArray as $file)
	// 			{
	// 				$fileInfo	=	pathinfo($file); //returned: dirname, basename, extension (if any), and filename.
	// 				$fileName	=	$fileInfo['basename'];
	// 				$dumpArray[] = '<script src="js\\' . $fileName . '"></script>';
	// 			}
	// 	$jsScripts = implode('', $dumpArray);
	// }
}


 ?>