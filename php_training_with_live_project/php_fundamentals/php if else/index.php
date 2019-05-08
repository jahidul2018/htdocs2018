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

			<p><a href="https://www.w3schools.com/php/php_operators.asp">logical Operators</a> is a link to a website on the World Wide Web.</p>
			
			<?php $x=10;
			if($x>100){
				echo "x is gater than 100";
			}elseif ($x<100) {
				echo "x is smaller than 100";
			}else{
				echo "nathing is right";
			} ?>
			
		</section>
		
		<section class="fooleroption"><h2><?php echo "www.mishuk.com"; ?> </h2></section>

		
	</div>
	
</body>
</html>