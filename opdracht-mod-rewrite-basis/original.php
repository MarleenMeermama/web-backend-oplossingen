<?php 

 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Untitled</title>
         <link rel="stylesheet" href="css/global.css">
         <link rel="author" href="humans.txt">
     </head>
     <body>
         <h1>original</h1>

         <form action="original.php" mehod="GET">
             
            <ul>
                <li>
                    <label for="user">Email:</label>
                    <input type="text" name="user" id="user">
                </li>
                <li>
                    <label for="orde">Paswoord:</label>
                    <input type="text" name="orde" id="orde">
                </li>
            </ul>

            <input type="submit" value="Verzend">
        </form>
        
        
        <p>Dump van GET-variabele:</p> 
        <?php var_dump($_GET) ?>

         </form>

     </body>
 </html>