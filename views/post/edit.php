<?php
if (isset($this->data)) {

?>
<article>
	<div>
		<form action="<?php echo URL ?>post/update/<?php echo $this->data[0]['post_id']?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

			<label for="content">What is on your mind?</label>
			<textarea name="text"><?php echo $this->data[0]['text']?></textarea>
			<label for="pic"></label>
			<input id ="updatefiles" type="file" name="files[]" multiple>
			<input id="remainfile" type="hidden" name="remain" value="">
			<input id="deletefile" type="hidden" name="delete" value="">

			<input type="submit" value="UPDATE">	

		</form>
		<section id="previewcontainer">

			<?php

			$files=explode(',',$this->data[0]['files']);
			
		        foreach ($files as $file) {
		        	echo '<div>';
		        	$dir = '../../private/post/files/';
                    echo $this->CreateELe($dir, $file);
		        	echo '<span class="remove">Remove<span>';
		        	echo '</div>';
		        }
           ?>
			<!-- <img id="preview"src="../../private/news/photos/<?php //echo $this->data[0]['newspic']?>  "  alt=""> -->
		</section>

	</div>
	<div>
		<section>
			
		</section>

	</div>

</article>



<?php
}

?>