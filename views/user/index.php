
<article>
	<div>
		<form action="<?php echo URL ?>user/insert" method="post"  enctype="multipart/form-data">

			<label for="name">USERNAME</label>
			<input type="text" name="name">
			<label for="pass">PASSWORD</label>
			<input type="password" name="pass">
			<label for="role">PASSWORD</label>
			<select name="role">
				<option value="admin">Admin</option>
				<option value="teacher">Teacher</option>
				<option value="student">Student</option>
			</select>
			<label for="pic">PROFILE PICTURE</label>
			<input id="uploadpic"type="file" name="userpic" >
			<input id="" type="submit" value="CREATE">
			
		</form>
		<section>
			<img id="preview" src="" alt="">

		</section>

	</div>

	<div>
		

<?php
if (isset($this->data) && !empty($this->data)) {

    $count = 1;
    foreach ($this->data as $key => $value) {
        echo '<section>';
        
        echo '<h3>' . $value['name'] . '</h3>';
        echo '<p>' . $value['role'] . '</p>';
        echo '<img src="private/user/photos/'. $value['userpic'] .'" alt="">';
        echo '<a id="" href="user/delete/' . $value['user_id'] . '">[delete]</a>';
        echo '<a id="" href="user/edit/' . $value['user_id'] . '">[edit]</a>';

        echo '</section>';
        $count++;
    }

}

?>
	
	</div>

</article>