<!DOCTYPE>
<html>
<head>
	<title>Search</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<style ></style>
</head>
<body>
	
	<script>
	$(document).ready(function(e){
		$("#search").keyup(function(){
			$("#show_up").show();
			var text = $(this).val();
			$.ajax({
				type: 'GET';
				url: 'search';
				data: 'txt=' + text;
				success: function(data){
					$("#show_up").html(data);
				}
			});

		})

	});	
	</script>
	<input type="text" name="names" id="search" />
	<div id="show_up"></div>
</body>
</html>