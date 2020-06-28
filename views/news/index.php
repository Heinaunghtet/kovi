
<article>
	<div>
		<form action="<?php echo URL ?>news/insert" method="post"  enctype="multipart/form-data">

			<label for="content">Content</label>
			<input type="content" name="title">
			<label for="text">Text</label>
			<textarea name="text"></textarea>
			<label for="pic">Photos</label>
			<input id="uploadpics"type="file" name="pics[]" multiple>
			<input id="" type="submit" value="UPLOAD">
			
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
        
        echo '<h3>' . $value['newscontent'] . '</h3>';
        echo '<p>' . $value['newstext'] . '</p>';
        $picture=explode(',',$value['newspic']);
        foreach ($picture as $pic) {
        	echo '<img src="private/news/photos/'. $pic .'" alt="">';
        }
        
        echo '<a id="" href="news/delete/' . $value['news_id'] . '">[delete]</a>';
        echo '<a id="" href="news/edit/' . $value['news_id'] . '">[edit]</a>';

        echo '</section>';
        $count++;
    }

}

?>
	
	</div>

</article>