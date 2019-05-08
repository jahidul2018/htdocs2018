<!--php variables-->
<?php 
$fonts = "verdana";
$bgcolor = "#444";
$color = "#FB8637";

 ?>

<!docktytype html>
<html>
<head>
	<title> php Variables </title>
	<style>
	body { font-family: <?php echo $fonts; ?> }
	.phpcoding{width: 900px; margin: 0 auto;background-color: #ddd; }
	.headeroption,.fooleroption{background: #444; color:<?php echo $color; ?>;text-align: center; padding: 20px;}
	.maincontent{min-height: 400px; padding: 20px;}
	.headeroption h2, .fooleroption h2{margin: 0px}
	</style>
</head>
<body>
	<div class="phpcoding">
		
		<section class="headeroption"><h2><?php echo"php fundamantal trining php variables"; ?></h2></section>
		<section class="maincontent">
			
				<?php echo $fonts."<br />";
						$a = 5; 
						$b=10; 
						$c=$a+$b;
						echo "Total value = ". $c. " ";

				?>
					
			</h2>
		</section>
		
		<section class="fooleroption"><h2><?php echo "www.mishuk.com"; ?> </h2></section>

		
	</div>
	
</body>
</html>