<h1>Services</h1>
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
	foreach ($services as $row) {
		if ($row["catname"]!=$current){
			$current=$row["catname"];
			echo "<h1>".$row["catname"]."</h2>";
		}
		echo '<form class="editform" action='.site_url("services/updatedeleteService").' method="POST">
		<input type="hidden" name="updid" value="'.$row["id"].'">
		<label>Name</label>
		<input class="form-control" type="text" name="name" value="'.$row["name"].'">
		<label>Price</label>
		<input class="form-control" type="number" name="price" value="'.$row["price"].'">
		<button class="btn btn-primary" type="submit" name="updbtn">Update</button>
		<button class="btn btn-danger" type="submit" name="delbtn">Delete</button></form>';
	}
?>
<h1>Add new Item</h1>
<form action="<?php echo site_url("services/addService"); ?>" method="post">
	<label>Name</label>
	<input class="form-control" type="text" name="name">
	<label>Price</label>
	<input class="form-control" type="number" name="price">
	<label>Category</label>
	<select class="form-control" name="cat_id">
		<?php foreach ($categories as $row) {
			echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
		} ?>
	</select>
	<button class="btn btn-success" type="submit" name="addbtn">Add</button>
</form>