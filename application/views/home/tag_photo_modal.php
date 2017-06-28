<div class="modal fade modal-dialog-center" id="tagmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Tag Photo</h4>
			</div>
			<form action="<?php echo base_url(); ?>home/doTag" method="post" name="tagphotoform" id="tagphotoform" role="form">
				<div class="modal-body">
					<div class="alert alert-danger hidden" id="errmsg">
					</div>
					<div class="container-fluid">
						<input type="hidden" id="photoId" name="photoId" />
						<div class="alert alert-info">
							<strong>Note:</strong> Multiple tags must be comma separated.
						</div>
						<div class="row form-group">
							<label for="photoTag" class="control-label">Tag(s)</label>
							<input type="text" id="photoTag" name="photoTag" class="form-control input-sm">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-primary btn-sm" onclick="Home.tag()" value="Add Tag">
				</div>
			</form>
		</div>
	</div>
</div>