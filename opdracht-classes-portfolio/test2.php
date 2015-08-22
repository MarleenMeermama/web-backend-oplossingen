<?php 

$dirName = dirname(dirname(__FILE__));
$cssDirName = $dirName . '\css';
$allCssFilesArray = glob($cssDirName . '\*.css');

var_dump($allCssFilesArray);


 ?>