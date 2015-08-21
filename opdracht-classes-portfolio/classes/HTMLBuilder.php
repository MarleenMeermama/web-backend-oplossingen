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
 	}

public function buildHeader () {
	return $this->header;
}


public function buildBody () {
	return $this->body;
}

public function buildFooter () {
	return $this->footer;
}

public function buildHTML () {
	$this->buildHeader();
	$this->buildBody();
	$this->buildFooter();


}
}


 ?>