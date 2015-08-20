<?php 

function __autoload($Percent) {
    $filename = "classes/". $Percent .".php";
    include_once($filename);
}

$new	=	150;
$unit	=	100;

$percent = new Percent( $new, $unit );

?>

<!DOCTYPE html>
<html>
<head>
	<title>oefening classes deel 1</title>
	<link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>
<body>

<table>
	<th colspan="2">Hoeveel procent is <?php echo $new ?> van <?php echo $unit ?>?</th>
	<tr>
		<td>Absoluut</td>
		<td><?php echo $percent->absolute ?></td>
	</tr>
	<tr>
		<td>Relatief</td>
		<td><?php echo $percent->relative  ?></td>
	</tr>
	<tr>
		<td>Geheel getal</td>
		<td><?php echo $percent->hundred ?>%</td>
	</tr>
	<tr>
		<td>Nominaal</td>
		<td><?php echo $percent->nominal ?></td>
	</tr>
</table>

</body>
</html>
 