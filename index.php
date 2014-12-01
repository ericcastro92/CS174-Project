<html>
	<?php require_once('config.php'); ?>
	<header>
		<title>
			CS174 - Group 1 - Home
		</title>
	</header>
	<body>
		<h1>
			Home
		</h1>
		<div>
		<object type="audio/x-mpeg" data="topgun.mp3" width="0" height="0">
		 	<param name="src" value="topgun.mp3">
		 	<param name="controller" value="false">
		 	<param name="autoplay" value="true">
			<param name="loop" value="false">
		</object>
		
		<?php echo $_SESSION['favorites']; ?>
	</body>
</html>
