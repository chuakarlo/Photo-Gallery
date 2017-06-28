<div class="container">
	<div class="well">
		<h2>Photo Gallery</h2>
		<div class="table-responsive panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-2 col-md-offset-10 text-right">
						<button class="btn-primary" onclick="Home.loadModal()">Upload Photo</button>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="alert alert-success hidden" id="successmsg">
					</div>
				</div>
				<div id="photodump">
					<?php if($photos == null) { ?>
						<span>No photos uploaded. Click this <a href="#" onclick="Home.loadModal()">link</a> to upload photos.</span>
					<?php } else { ?>
						<?php foreach($photos as $row): ?>
							<div class="col-md-4">
								<img src="<?php echo base_url(); ?>uploads/<?php echo $row->file_name; ?>" height="300" width="300" id="<?php echo $row->photoId; ?>" onclick="Home.loadTagModal(<?php echo $row->photoId ?>)">
								<label>
									Tags:
									<?php foreach(explode(",",$row->image_tags) as $tag): ?>
										<a href="#"><?php echo $tag; ?></a>
									<?php endforeach; ?>
								</label>
							</div>
						<?php endforeach; ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>