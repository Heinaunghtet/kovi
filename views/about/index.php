<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($this->title) ? $this->title :'kovi';?></title>
	<link rel="stylesheet" href="<?php echo URL ?>public/css/default.css">
	<script type="text/javascript" src="<?php echo URL ?>public/script/jquery.js"></script>
	<script type="text/javascript" src="<?php echo URL ?>public/script/custom.js"></script>
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
<article>
	<section>
		
	</section>
	<section>
		
	</section>
	<section>
		
	</section>
	<section>
		
	</section>
	<section>
		
	</section>
	<section>
		
	</section>
	<section>
		
	</section>
	<section>
		
	</section>
	
</article>

<footer>

	<p> Copyright © <?php echo (date('Y')-1)." - ".date('Y');  ?> by H@H</p>
	
</footer>
</body>
</html>