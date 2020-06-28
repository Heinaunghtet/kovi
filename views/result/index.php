
<article>
	<section>
		

	<div>
		<form class="normalform"action="<?php echo URL ?>result/insert" method="post"  enctype="multipart/form-data">


			<label for="text">Class</label>
			<input type="text" name="stuclass">
			<label for="text">Name</label>
			<input type="text" name="stuname">
			<label for="text">Subject</label>
			<input type="text" name="subject">
			<label for="text">Mark</label>
			<input type="number" name="mark">
			<input id="" type="submit" value="ADD">

		</form>

		

	</div>
</section>
<section>
	<div>
		
	

		<form action="<?php echo URL ?>result/insert" method="post" enctype="multipart/form-data">

			<label id="labexcel"for="files">Add By Excel</label>
			<input id="excel"type="file" name="excel">
			<label id="labcsv"for="files">Add By CSV</label>
			<input id="csv"type="file" name="csv">
			<input style="display: none;" class="submitall" type="submit" value="ADD ALL">

		</form>

	

	</div>
</section>
<section>
	<div class="exceshow">
	
	</div>
</section>
<section>
	
<div>
		<button id="exceloutput"type="">Excel</button>
		<button id="csvoutput"type="">CSV</button>
		<table>
		<caption>Marks List</caption>
		<thead>
			<tr>
				<td>NO</td>
				<td>class</td>
				<td>Name</td>
				<td>Subject</td>
				<td>Mark</td>
				<td>Date</td>
				<td>Del</td>
				<td>Edit</td>
				<td><input type="checkbox" class="selectall"></td>
			</tr>
		</thead>

		<tbody>
			

<?php
if (isset($this->data) && !empty($this->data)) {

    $count = 1;
    foreach ($this->data as $key => $value) {
        echo '<tr>';
        echo '<td>' . $count . '</td>';
        echo '<td>' . $value['class'] . '</td>';
        echo '<td>' . $value['name'] . '</td>';
        echo '<td>' . $value['subject'] . '</td>';
        echo '<td>' . $value['mark'] . '</td>';
        echo '<td>' . $value['date'] . '</td>';
        echo '<td><a id="" href="result/delete/' . $value['id'] . '">[delete]</a></td>';
        echo '<td><a id="" href="result/edit/' . $value['id'] . '">[edit]</a></td>';
        echo '<td><input type="checkbox" val="'. $value['id'] . '" class="select"></td>';

        echo '</tr>';
        $count++;
    }

}

?>
		</tbody>
	</table>

	</div>
</section>	

	

</article>