<?php
if (isset($this->data)) {

?>
<article>
	<div>
		<form action="<?php echo URL ?>result/update/<?php echo $this->data[0]['id']?>" method="post" accept-charset="utf-8">
			<label for="text">Class</label>
			<input type="text" name="stuclass"value="<?php echo $this->data[0]['class']?>">
			<label for="text">Name</label>
			<input type="text" name="stuname"value="<?php echo $this->data[0]['name']?>">
			<label for="text">Subject</label>
			<input type="text" name="subject"value="<?php echo $this->data[0]['subject']?>">
			<label for="text">Mark</label>
			<input type="number" name="mark"value="<?php echo $this->data[0]['mark']?>">
			<input type="submit" value="UPDATE">

		</form>

	</div>
	

</article>



<?php
}

?>