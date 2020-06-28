<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($this->title) ? $this->title :'kovi';?></title>
	<link rel="stylesheet" href="<?php echo URL ?>public/css/default.css">
	<script type="text/javascript" src="<?php echo URL ?>public/script/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL ?>public/script/custom.js"></script>
    <script src="<?php echo URL ?>public/script/exceloutputjs/xlsx.core.min.js"></script>
	<script type="text/javascript" src="<?php echo URL ?>public/script/exceloutputjs/FileSaver.js"></script>
	<script type="text/javascript" src="<?php echo URL ?>public/script/exceloutputjs/jhxlsx.js"></script>
	<?php 
	if(isset($this->js)){
		$this->script($this->js);
	}
	if(isset($this->css)){
		$this->style($this->css);
	}  
	   
	?>
</head>
<body>
	
	<header id="header" class="headr">
		<h2>KOVI</h2>
		<p>Write more,do less</p>
		
	</header>

	<nav id="nav" class="nav">
		<ul>
			<li><a href="<?php echo URL ?>index" title="">KOVI</a></li>
			<li><a href="<?php echo URL ?>login" title="">LOGIN</a></li>
			<li><a href="<?php echo URL ?>help" title="">HELP</a></li>
			<li><a href="<?php echo URL ?>about" title="">ABOUT</a></li>
			<li><a href="<?php echo URL ?>logout" title="">LOGOUT</a></li>
			<li><a href="<?php echo URL ?>home" title="">HOME</a></li>
			<li><a href="<?php echo URL ?>note" title="">NOTES</a></li>
			<li><a href="<?php echo URL ?>news" title="">NEWS</a></li>
			<li><a href="<?php echo URL ?>user" title="">USERS</a></li>
			<li><a href="<?php echo URL ?>post" title="">POSTS</a></li>
			<li><a href="<?php echo URL ?>result" title="">RESULT</a></li>
			
		</ul>
	</nav>