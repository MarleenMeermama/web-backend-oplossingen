<?php  

$cijfers = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
$uniekeCijfers	=	array_unique($cijfers);

$CijfersAsString=	implode(",",$cijfers);
$uniekeCijfersAsString = implode(",", $uniekeCijfers);

rsort($uniekeCijfers);
$sortUniekeCijfersAsString = implode(",",$uniekeCijfers);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>array functies deel 3</title>
        
    </head>
    <body>
        <h1> array functies deel 3 </h1>
        <p>Als je de cijfers "<?php  echo $CijfersAsString?>"  uniek maakt, krijg je "<?php echo $uniekeCijfersAsString ?>". </p>
        <p>Als je deze van hoog naar laag sorteert krijg je "<?php echo $sortUniekeCijfersAsString ?>"</p>


        
    </body>
</html>