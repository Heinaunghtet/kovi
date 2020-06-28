<?php
if (isset($this->data)) {

?>
<article>
	<div>
		<form action="<?php echo URL ?>news/update/<?php echo $this->data[0]['news_id']?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

			<label for="content">Content</label>
			<input type="content" name="title" value="<?php echo $this->data[0]['newscontent']?>">
			<label for="text">Text</label>
			<textarea name="text"><?php echo $this->data[0]['newstext']?></textarea>
			<label for="pic">Photo</label>
			<input id ="updatepic" type="file" name="pics[]" multiple>
			<input id="remainpic" type="hidden" name="remain" value="">
			<input id="deletepic" type="hidden" name="delete" value="">

			<input type="submit" value="UPDATE">	

		</form>
		<section id="imgcontainer">

			<?php

			$picture=explode(',',$this->data[0]['newspic']);
			
		        foreach ($picture as $pic) {
		        	echo '<div>';
		        	echo '<img class="photo"val="'.$pic.'"src="../../private/news/photos/'. $pic .'" alt=""><span class="remove">Remove<span>';
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