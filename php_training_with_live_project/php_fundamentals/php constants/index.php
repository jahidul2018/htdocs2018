<!docktytype html>
<html>
<head>
	<title> php constants</title>
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
		
		<section class="headeroption"><h2><?php echo"php fundamantal constants trining"; ?></h2></section>
		<section class="maincontent">
			<?php 



			define("value","I am learning Php ");
			echo value;
			echo "<hr />";

			//useing the groble variable 

			function learnphp(){
				echo value;
			}
			learnphp();

			 ?>
		</section>
		<section class="fooleroption"><h2><?php echo "www.mishuk.com"; ?> </h2></section>

		
	</div>
	
</body>
</html>