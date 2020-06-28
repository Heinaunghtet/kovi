
<article>
	<div>
		<form action="<?php echo URL ?>note/insert" method="post" accept-charset="utf-8">
			<label for="title">Title</label>
			<input type="text" name="title">
			<label for="description">Description</label>
			<textarea name="description"></textarea>
			<input type="submit" value="CREATE">

		</form>

	</div>
	<div>
		<table>
		<caption>Note List</caption>

		<tbody>

<?php
if (isset($this->data) && !empty($this->data)) {

    $count = 1;
    foreach ($this->data as $key => $value) {
        echo '<tr>';
        echo '<td>' . $count . '</td>';
        echo '<td>' . $value['title'] . '</td>';
        echo '<td>' . $value['text'] . '</td>';
        echo '<td>' . $value['create_date'] . '</td>';
        echo '<td><a id="" href="note/delete/' . $value['note_id'] . '">[delete]</a></td>';
        echo '<td><a id="" href="note/edit/' . $value['note_id'] . '">[edit]</a></td>';

        echo '</tr>';
        $count++;
    }

}

?>
		</tbody>
	</table>

	</div>

</article>