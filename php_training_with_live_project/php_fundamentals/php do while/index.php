<!docktytype html>
<html>
<head>
	<title> php syntax </title>
	<style>
	.phpcoding{width: 900px;margin: 0 auto;background-color: #ddd; }
	.headeroption, .fooleroption{background: #444; color: #fff;text-align: center; padding: 20px;}
	.maincontent{min-height: 437px;}
	.headeroption h2, .fooleroption h2{margin: 0px}
	</style>
</head>
<body>
	<div class="phpcoding">
		
		<section class="headeroption"><h2><?php echo"php fundamantal trining"; ?></h2></section>
		<section class="maincontent">
			<?php 
				$x=12;
				do {
					echo "the number is $x <br />";
					$x++;
				} while ( $x<= 10); ?>
				
		</section>
		
		<section class="fooleroption"><h2><?php echo "www.mishuk.com"; ?> </h2></section>

		
	</div>
	
</body>
</html>