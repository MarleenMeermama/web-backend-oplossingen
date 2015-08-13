<?php 

	$cijfers1 = array(1,2,3,4,5);
    $cijfers2 = array(5,4,3,2,1);
    $cijfers3   =   array();
    $productCijfers = array_product($cijfers1);



    for ($i=0;$i<count($cijfers1);$i++) {

        $cijfers3[$i] = $cijfers1[$i] + $cijfers2[$i];
    }



 ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>oplossing arrays basis deel 2</title>
        
    </head>
    <body>
        
        <h1>oplossing arrays basis deel 2</h1>
        <p> Het product van de cijfers bedraagt <?php echo $productCijfers ?> </p>
        
        <p>De oneven getallen zijn 
            <?php 
            for ($i=0;$i<count($cijfers1);$i++) {
                if ($cijfers1[$i]%2==1) 
                    {
                        echo $cijfers1[$i].','; 
                    };
            }
            ?>
      </p>
        
        <p> Optellen van de getallen uit <pre> <?php var_dump($cijfers1) ?></pre> en <pre><?php var_dump($cijfers2) ?></pre> geeft <pre><?php var_dump($cijfers3) ?></pre>
        </p>


    </body>
</html>