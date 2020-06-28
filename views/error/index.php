
<?php //Session::Init();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($this->title) ? $this->title :'MVC';?></title>
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

<div class="main">
  <h2 class="title">Stay Home Stay Safe And Find Errors</h2>
  <div class="home">
    <div class="tree">
      <div class="treeMain">
        <div class="branch"></div>
        <div class="branch"></div>
      </div>
      <div class="trunk"></div>
    </div>
    <div class="homeBody"> 
      <div class="wall"></div>
      <div class="chimney"></div>
      <div class="terrace"> </div>
      <div class="door"></div>
      <div class="window"></div>
    </div>
    <div class="ground"></div>
    <div class="covid">   </div>
    <div class="covid1"></div>
    <div class="covid2">   </div>
    <div class="covid3"></div>
  </div>
</div>
</body>
</html>

