<!docktytype html>
<html>
<head>
	<title> php syntax string </title>
	<style>
	.phpcoding{width: 900px; margin: 0 auto;background-color: #ddd; }
	.headeroption, 
	.fooleroption{background: #444; color: #fff;text-align: center; padding: 20px;}
	.maincontent{min-height: 400px; padding: 20px;}
	.headeroption h2, .fooleroption h2{margin: 0px}
	</style>
</head>
<body>
	<div class="phpcoding">
		
		<section class="headeroption"><h2><?php echo"php fundamantal trining"; ?></h2></section>
		<section class="maincontent">
			<?php 

			
				$x = "string nice";


				echo strlen($x);
				echo "<hr/>";

				echo str_word_count($x);
				echo "<hr/>";

				echo strrev($x);
				echo "<hr/>";

				echo strpos($x,"nice");
				echo "<hr/>";

				echo str_replace("string", "mishuk",$x);
				echo "<hr/>";




			 ?>
		</section>
		<section class="fooleroption"><h2><?php echo "www.mishuk.com"; ?> </h2></section>

		
	</div>
	
</body>
</html>