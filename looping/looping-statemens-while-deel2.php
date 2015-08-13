<?php 
$boodschappenlijstje = Array('sla','tomaten','rijst','wijn');
$aantal = count($boodschappenlijstje);
$teller = 0;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>looping statements while deel 2</title>
    <body>
        <h1>looping statements while deel 2</h1>
        <div>
        	<ul>
        		<?php 
	        		while ($teller < $aantal) 
	        		{
	        			echo '<li>'. $boodschappenlijstje[$teller] .'</li>';
	        			++$teller;
	        		}
        		?>
        	</ul>
        </div>
        
    </body>
</html>