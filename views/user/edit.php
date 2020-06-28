<?php
if (isset($this->data)) {

?>
<article>
	<div>
		<form action="<?php echo URL ?>user/update/<?php echo $this->data[0]['user_id']?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

			<label for="name">USERNAME</label>
			<input type="text" name="name" value="<?php echo $this->data[0]['name']?>">
			<label for="pass">PASSWORD</label>
			<input type="password" name="pass">
			<label for="role">ROLE</label>
			<select name="role">
				<option value="admin" <?php if($this->data[0]['role']=='admin'){echo 'selected';}?>>Admin</option>
				<option value="teacher"<?php if($this->data[0]['role']=='teacher'){echo 'selected';}?>>Teacher</option>
				<option value="student"<?php if($this->data[0]['role']=='student'){echo 'selected';}?>>Student</option>
			</select>
			<label for="pic">PROFILE PICTURE</label>
			<input id="uploadpic"type="file" name="userpic" >
			<input id="" type="submit" value="UPDATE">
		</form>
		<section>
			<img id="preview"src="../../private/user/photos/<?php echo $this->data[0]['userpic']?>  "  alt="">
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