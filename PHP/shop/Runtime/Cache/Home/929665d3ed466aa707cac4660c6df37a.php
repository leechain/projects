<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="/shop/Public/a.css" />
	<script type="text/javascript" src="/shop/Public/b.js"></script> -->

	<script type="text/javascript" src="/shop/Public/b.js"></script>
</head>
<body>
	<h1>
		<!-- 三元运算符 -->
		<!-- <?php echo ($ff>4?'大于4':'小于等于4'); ?>
		<br> -->

		<!-- if条件语句 -->
		<!-- <?php if($ff == 5): echo ($ff); ?>
			<?php else: ?> <?php echo ($ff); ?>000<?php endif; ?> -->

		<!-- foreach循环 -->
		<?php if(is_array($ff)): foreach($ff as $key=>$value): echo ($value["title"]); endforeach; endif; ?>

	</h1>
</body>
</html>