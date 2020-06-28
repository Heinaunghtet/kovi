<?php
if (isset($this->data)) {

?>


<article>

	<div>
		<form action="<?php echo URL ?>note/update" method="post" accept-charset="utf-8">
			<input type="hidden" name="where" value="<?php echo $this->data[0]['note_id']?>">
			<label for="title">Title</label>
			<input type="text" name="title" value="<?php echo $this->data[0]['title']?>">
			<label for="description">Description</label>
			<textarea name="description"><?php echo $this->data[0]['text']?></textarea>
			<input type="submit" value="UPDATE">

		</form>

	</div>

</article>


<?php
}

?>