<div class="text-center">
	<h1> Profile</h1>
	<h1>Welcome <?php echo $_SESSION['user_data']['name']; ?><h1>
	<p class="lead">Find something cool? Share it with our community. Look at other shares as well</p>
	

	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
	<?php endif; ?>

</div>

<div>
	<?php $username=$_SESSION['user_data']['id']; echo "$username";  ?>

	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['title']; ?></h3>
			<small><?php echo $item['create_date']; ?></small>
			<hr />
			<p><?php echo $item['body']; ?></p>
			<br />
			<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
		</div>
	<?php endforeach; ?>
</div>

