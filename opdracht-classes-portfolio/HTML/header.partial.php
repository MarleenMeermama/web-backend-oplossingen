<!DOCTYPE html>
<html>

<head>
	
	<meta charset="utf-8">
	<title>Opdracht classes: portfolio</title>

    
    <?php foreach ($page->getCssLinks() as $value): ?>
        <link rel="stylesheet" href="<?php echo $value ?>">
    <?php endforeach ?>
    
  
		
</head>

<body>
	<section class="body">
	
        <div class="facade-minimal" data-url="http://www.app.local/index.php">
        <div class="portfolio">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,900,700,200' rel='stylesheet' type='text/css'>
  

        <header class="group">
            <div class="logo">
               <a href="#">Theo <span>Jansen</span></a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Strandbeesten</a></li><!--
                    --><li><a href="#">Galerij</a></li><!--
                    --><li><a href="#">Blog</a></li><!--
                    --><li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header>