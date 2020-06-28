
<article>
	<div>
		<form action="<?php echo URL ?>post/insert" method="post"  enctype="multipart/form-data">


			<label for="text">What is on your Mind?</label>
			<textarea name="text"></textarea>
			<label for="files">Add More</label>
			<input id="uploadfiles"type="file" name="files[]" multiple>
			<input id="" type="submit" value="POST">

		</form>

		
		<section id="previewcontainer">

		</section>

	</div>

	<div>


<?php
if (isset($this->data) && !empty($this->data)) {

    $count = 1;
    foreach ($this->data as $key => $value) {
        echo '<section>';

        echo '<p>' . $value['text'] . '</p>';
        $files = explode(',', $value['files']);
        foreach ($files as $file) {
            $dir      = 'private/post/files/';
            echo $this-> CreateELe($dir,$file);
        }

        echo '<a id="" href="post/delete/' . $value['post_id'] . '">[delete]</a>';
        echo '<a id="" href="post/edit/' . $value['post_id'] . '">[edit]</a>';

        echo '</section>';
        $count++;
    }

}

?>

	</div>

</article>