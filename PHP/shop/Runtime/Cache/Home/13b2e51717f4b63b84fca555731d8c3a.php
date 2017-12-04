<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1><?php echo ($a); ?></h1>
	<!-- <?php echo U('Home/User/ff',array('id'=>3));?> -->

	<form action="<?php echo U('Home/User/ff');?>" method="post">
		<input type="text" name="id" value="">
		<input type="submit" name="" value="点我呀！">
	</form>

	

</body>
</html>