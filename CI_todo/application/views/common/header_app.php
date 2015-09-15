<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Labo-opdracht">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?></title> 
        <link media="all" type="text/css" rel="stylesheet" href="http://pascalculator.be/vdab/public/css/global.css">
    </head>
    <body>
        <div id="container">
        	<header class="group">
        		<div>
        			<a href= "<?php echo site_url('welcome/view'); ?>">Home</a>
        		</div>
        		<nav>
        			<ul>
        				<li>
        					<a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('todo'); ?>">Todos</a>
        				</li>
                        <li>
                            <a href="<?php echo site_url('logout'); ?>">Logout ( <?php echo ($this->session->userdata('email'))? $this->session->userdata('email'):'' ?> )</a>
                        </li>
        			</ul>
        		</nav>
        	</header>
        	
        	
        


                