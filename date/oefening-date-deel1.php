<?php  

//voor Windows
setlocale(LC_ALL, 'nld_nld');
$timestamp = mktime(22,35,25,1,21,1904);
$date	=	date( 'd F Y, g:i:s A' ,$timestamp);
$datumNederlands = strftime ( '%d %B %Y, %H:%M:%S %p', $timestamp );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>oefening date deel 1</title>
    </head>

    <body>
    	 <h1>oefening date deel 1</h1>
       	<p>De timestamp van de datum 22u 35m 25sec 21 januari 1904 is <?php echo $timestamp ?></p>
       	<p>De datum is <?php echo $date ?></p>
       	<p><?php echo $datumNederlands ?></p>
    </body>
</html>