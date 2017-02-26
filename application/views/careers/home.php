<h1>Careers</h1>
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
	foreach ($careers as $row) {
		echo '<form class="editform" action='.site_url("careers/updatedeleteCareer").' method="POST">
		<input class="form-control" type="hidden" name="updid" value="'.$row["id"].'">
		<label>Name</label>
		<input class="form-control" type="text" name="name" value="'.$row["name"].'">
		<label>Description</label>
		<textarea class="form-control" name="description">'.$row["description"].'</textarea>
		<button class="btn btn-primary" type="submit" name="updbtn">Update</button>
		<button class="btn btn-danger" type="submit" name="delbtn">Delete</button></form>';
	}
?>
<h1>Add new Item</h1>
<form action="<?php echo site_url("careers/addCareer"); ?>" method="post">
	<label>Name</label>
	<input class="form-control" type="text" name="name">
	<label>Description</label>
	<textarea class="form-control" name="description"></textarea>
	<button class="btn btn-success" type="submit" name="addbtn">Add</button>
</form>