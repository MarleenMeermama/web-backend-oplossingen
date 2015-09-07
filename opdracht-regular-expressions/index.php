<?php 
$regex = '';
$searchString = '';
$result = '';
$replaceString = '<span class="result">#</span>';

if(isset($_POST['submit'])){

	$regex			=	$_POST[ 'regex' ];
	$searchString	=	$_POST[ 'searchString' ];
	$result 		=	preg_replace( '/' . $regex . '/', $replaceString, $searchString );
	
}


$regExp01	=	'/[a-du-zA-DU-Z]/';
			
$regExp01SearchString = " Memory can change the shape of a room; it can change the color of a car. And memories can be distorted. They're just an interpretation, they're not a record, and they're irrelevant if you have the facts.";
			
$regExp01Result	=	preg_replace($regExp01, $replaceString, $regExp01SearchString );


$regExp02	=	'/color|colour/';
			
$regExp02SearchString = " Zowel colour als color zijn correct Engels. ";
			
$regExp02Result	=	preg_replace($regExp02, $replaceString, $regExp02SearchString );


$regExp03	=	'/1[0-9]{3}/';
			
$regExp03SearchString = " 1235 45678 12456 23541 1282 1589 35468 123456 ";
			
$regExp03Result	=	preg_replace($regExp03, $replaceString, $regExp03SearchString );


$regExp04	=	'/[0-9]{2}[\/\-\.][0-9]{2}[\/\-\.]\d{4}/'; 
			
$regExp04SearchString = "24/07/1978 en 24-07-1978 en 24.07.1978";
			
$regExp04Result	=	preg_replace($regExp04, $replaceString, $regExp04SearchString );


 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Untitled</title>
         <link rel="stylesheet" href="css/global.css">
     </head>
     <style>
		textarea 
		{
			width: 200px;
			height: 100px;
		}
		.result span 
		{
			color: green;
			background-color: grey;
		}

		.str span
		{
			color: green;

		}
     </style>
     <body>

     	<h1>RegEx tester</h1>
		
		
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			
			<ul>
				<li>
					<label for="regex">Regular expression</label>
					<input type="text" name="regex" id="regex" value="<?= $regex ?>">
				</li>
				<li>
					<label for="searchString">String</label>
					<textarea type="text" name="searchString" id="searchString"> <?= $searchString ?></textarea>
				</li>
			</ul>
			<input type="submit" name="submit">
		</form>

	<?php if (isset($_POST['submit'])): ?>
		
		<p>Resultaat: <?php echo $result ?></p>

		
	<?php endif ?>

        <h2>Match zowel colour als color </h2>

		<p>De regular expression <code><?php echo $regExp01 ?></code> op de string <span class="str
"><?php echo $regExp01SearchString ?></span> heeft het resultaat </p>
		<p><span class="result"><?php echo $regExp01Result ?></span></p> 

		<h2>Match zowel colour als color </h2>

		<p>De regular expression <code><?php echo $regExp02 ?></code> op de string <span class="str
"><?php echo $regExp02SearchString ?></span> heeft het resultaat </p>
		<p><span class="result"><?php echo $regExp02Result ?></span></p>

		<h2>Match enkel de getallen die een 1 als duizendtal hebben</h2>

		<p>De regular expression <code><?php echo $regExp03 ?></code> op de string <span class="str
"><?php echo $regExp03SearchString ?></span> heeft het resultaat </p>
		<p><span class="result"><?php echo $regExp03Result ?></span></p>

		<h2>Match alle data zodat er enkel een reeks "en" overblijft. </h2>

		<p>De regular expression <code><?php echo $regExp04 ?></code> op de string <span class="str
"><?php echo $regExp04SearchString ?></span> heeft het resultaat </p>
		<p><span class="result"><?php echo $regExp04Result ?></span></p>


     </body>
 </html>