<h1>Doctors</h1>
<?php
	if (isset($success)){
		if ($success!=0){
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				  <strong>Success</strong> Database updated
				</div>';
		}
	}
	$current = "";
	foreach ($doctors as $row) {
		if ($row["catname"]!=$current){
			$current=$row["catname"];
			echo "<h1>".$row["catname"]."</h2>";
		}
		echo '<form class="editform" action='.site_url("doctors/updatedeleteDoctor").' method="POST">
		<input type="hidden" name="updid" value="'.$row["id"].'">
		<label>Name</label>
		<input class="form-control" type="text" name="name" value="'.$row["name"].'">
		<label>Position</label>
		<textarea class="form-control" name="position">'.$row["position"].'</textarea>
		<img class="img-fluid" src='.$row["photo_url"].'>
		<textarea class="form-control" name="photo_url">'.$row["photo_url"].'</textarea>
		<button class="btn btn-primary" type="submit" name="updbtn">Update</button>
		<button class="btn btn-danger" type="submit" name="delbtn">Delete</button></form>';
	}
?>
<h1>Add new Item</h1>
<form action="<?php echo site_url("doctors/addDoctor"); ?>" method="post">
	<label>Name</label>
	<input class="form-control" type="text" name="name">
	<label>Position</label>
	<textarea class="form-control" name="position"></textarea>
	<label>Photo</label>
	<textarea class="form-control" name="photo_url"></textarea>
	<select class="form-control" name="cat_id">
		<?php foreach ($categories as $row) {
			echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
		} ?>
	</select>
	<button class="btn btn-success" type="submit" name="addbtn">Add</button>
</form>