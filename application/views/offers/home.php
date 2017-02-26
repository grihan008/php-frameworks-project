<h1>Special Offers</h1>
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
	foreach ($offers as $row) {
		echo '<form class="editform" action='.site_url("offers/updatedeleteOffer").' method="POST">
		<input type="hidden" name="updid" value="'.$row["id"].'">
		<input class="form-control" type="text" name="name" value="'.$row["name"].'">
		<textarea class="form-control" name="description">'.$row["description"].'</textarea>
		<button class="btn btn-primary" type="submit" name="updbtn">Update</button>
		<button class="btn btn-danger" type="submit" name="delbtn">Delete</button></form>';
	}
?>
<h1>Add new Item</h1>
<form action="<?php echo site_url("offers/addOffer"); ?>" method="post">
	<input class="form-control" type="text" name="name">
	<textarea class="form-control" name="description"></textarea>
	<button class="btn btn-success" type="submit" name="addbtn">Add</button>
</form>