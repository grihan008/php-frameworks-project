<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url("css/style.css"); ?>">
</head>
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="save">Delete</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="upd">Update</button>
      </div>
    </div>
  </div>
</div>
<body class="container">
<main class="row">
	<ul class="col-md-2 nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url("Services/index") ?>">Services</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url("Doctors/index") ?>">Doctors</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url("Careers/index") ?>">Careers</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url("Offers/index") ?>">SpecialOffers</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo site_url("Gallery/index") ?>">Gallery</a></li>
	</ul>
	<div class="col-md-10">
	<?php $this->load->view($page) ?>
	</div>
</main>
</body>
<script>
	var form;
	$(".editform button[name='delbtn']").click(function(e){
		e.preventDefault();
		form=$(this).closest("form");
		$('#myModalDelete').modal('show')
	});
	$("#myModalDelete #save").click(function(){
		var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "delbtn").val("del");
		form.append($(input));
		form.submit();
	});
	$(".editform button[name='updbtn']").click(function(e){
		e.preventDefault();
		form=$(this).closest("form");
		$('#myModalUpdate').modal('show')
	});
	$("#myModalUpdate #upd").click(function(){
		var input = $("<input>")
               .attr("type", "hidden")
               .attr("name", "updbtn").val("upd");
		form.append($(input));
		form.submit();
	})
</script>
</html>